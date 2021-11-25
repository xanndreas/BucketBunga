<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialForRequest;
use App\Http\Requests\UpdateSpecialForRequest;
use App\Http\Resources\Admin\SpecialForResource;
use App\Models\SpecialFor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpecialForApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('special_for_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpecialForResource(SpecialFor::all());
    }

    public function store(StoreSpecialForRequest $request)
    {
        $specialFor = SpecialFor::create($request->all());

        return (new SpecialForResource($specialFor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SpecialFor $specialFor)
    {
        abort_if(Gate::denies('special_for_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpecialForResource($specialFor);
    }

    public function update(UpdateSpecialForRequest $request, SpecialFor $specialFor)
    {
        $specialFor->update($request->all());

        return (new SpecialForResource($specialFor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SpecialFor $specialFor)
    {
        abort_if(Gate::denies('special_for_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialFor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
