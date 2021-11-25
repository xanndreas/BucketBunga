@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.specialFor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.special-fors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.specialFor.fields.id') }}
                        </th>
                        <td>
                            {{ $specialFor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialFor.fields.name') }}
                        </th>
                        <td>
                            {{ $specialFor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialFor.fields.description') }}
                        </th>
                        <td>
                            {{ $specialFor->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.special-fors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#special_for_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="special_for_items">
            @includeIf('admin.specialFors.relationships.specialForItems', ['items' => $specialFor->specialForItems])
        </div>
    </div>
</div>

@endsection