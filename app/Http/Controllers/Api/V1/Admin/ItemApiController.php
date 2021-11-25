<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\Admin\ItemResource;
use App\Models\Item;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemResource(Item::with(['category', 'colors', 'special_fors', 'location'])->get());
    }

    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->all());
        $item->colors()->sync($request->input('colors', []));
        $item->special_fors()->sync($request->input('special_fors', []));
        foreach ($request->input('photo', []) as $file) {
            $item->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        return (new ItemResource($item))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Item $item)
    {
        abort_if(Gate::denies('item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemResource($item->load(['category', 'colors', 'special_fors', 'location']));
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->all());
        $item->colors()->sync($request->input('colors', []));
        $item->special_fors()->sync($request->input('special_fors', []));
        if (count($item->photo) > 0) {
            foreach ($item->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $item->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $item->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return (new ItemResource($item))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Item $item)
    {
        abort_if(Gate::denies('item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
