<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySpecialForRequest;
use App\Http\Requests\StoreSpecialForRequest;
use App\Http\Requests\UpdateSpecialForRequest;
use App\Models\SpecialFor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SpecialForController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('special_for_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SpecialFor::query()->select(sprintf('%s.*', (new SpecialFor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'special_for_show';
                $editGate = 'special_for_edit';
                $deleteGate = 'special_for_delete';
                $crudRoutePart = 'special-fors';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.specialFors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('special_for_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.specialFors.create');
    }

    public function store(StoreSpecialForRequest $request)
    {
        $specialFor = SpecialFor::create($request->all());

        return redirect()->route('admin.special-fors.index');
    }

    public function edit(SpecialFor $specialFor)
    {
        abort_if(Gate::denies('special_for_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.specialFors.edit', compact('specialFor'));
    }

    public function update(UpdateSpecialForRequest $request, SpecialFor $specialFor)
    {
        $specialFor->update($request->all());

        return redirect()->route('admin.special-fors.index');
    }

    public function show(SpecialFor $specialFor)
    {
        abort_if(Gate::denies('special_for_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialFor->load('specialForItems');

        return view('admin.specialFors.show', compact('specialFor'));
    }

    public function destroy(SpecialFor $specialFor)
    {
        abort_if(Gate::denies('special_for_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialFor->delete();

        return back();
    }

    public function massDestroy(MassDestroySpecialForRequest $request)
    {
        SpecialFor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
