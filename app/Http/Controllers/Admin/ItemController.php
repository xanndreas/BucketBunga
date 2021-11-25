<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyItemRequest;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Item;
use App\Models\Location;
use App\Models\SpecialFor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Item::with(['category', 'colors', 'special_fors', 'location'])->select(sprintf('%s.*', (new Item())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'item_show';
                $editGate = 'item_edit';
                $deleteGate = 'item_delete';
                $crudRoutePart = 'items';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('color', function ($row) {
                $labels = [];
                foreach ($row->colors as $color) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $color->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('special_for', function ($row) {
                $labels = [];
                foreach ($row->special_fors as $special_for) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $special_for->name);
                }

                return implode(' ', $labels);
            });
            $table->addColumn('location_district', function ($row) {
                return $row->location ? $row->location->district : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('rating', function ($row) {
                return $row->rating ? $row->rating : '';
            });
            $table->editColumn('photo', function ($row) {
                if (!$row->photo) {
                    return '';
                }
                $links = [];
                foreach ($row->photo as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'color', 'special_for', 'location', 'photo']);

            return $table->make(true);
        }

        $categories   = Category::get();
        $colors       = Color::get();
        $special_fors = SpecialFor::get();
        $locations    = Location::get();

        return view('admin.items.index', compact('categories', 'colors', 'special_fors', 'locations'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::pluck('name', 'id');

        $special_fors = SpecialFor::pluck('name', 'id');

        $locations = Location::pluck('district', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.items.create', compact('categories', 'colors', 'special_fors', 'locations'));
    }

    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->all());
        $item->colors()->sync($request->input('colors', []));
        $item->special_fors()->sync($request->input('special_fors', []));
        foreach ($request->input('photo', []) as $file) {
            $item->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $item->id]);
        }

        return redirect()->route('admin.items.index');
    }

    public function edit(Item $item)
    {
        abort_if(Gate::denies('item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::pluck('name', 'id');

        $special_fors = SpecialFor::pluck('name', 'id');

        $locations = Location::pluck('district', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item->load('category', 'colors', 'special_fors', 'location');

        return view('admin.items.edit', compact('categories', 'colors', 'special_fors', 'locations', 'item'));
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

        return redirect()->route('admin.items.index');
    }

    public function show(Item $item)
    {
        abort_if(Gate::denies('item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->load('category', 'colors', 'special_fors', 'location', 'itemCarts');

        return view('admin.items.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        abort_if(Gate::denies('item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemRequest $request)
    {
        Item::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('item_create') && Gate::denies('item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Item();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
