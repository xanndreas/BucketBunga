@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.item.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.id') }}
                        </th>
                        <td>
                            {{ $item->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.name') }}
                        </th>
                        <td>
                            {{ $item->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.description') }}
                        </th>
                        <td>
                            {{ $item->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.category') }}
                        </th>
                        <td>
                            {{ $item->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.color') }}
                        </th>
                        <td>
                            @foreach($item->colors as $key => $color)
                                <span class="label label-info">{{ $color->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.special_for') }}
                        </th>
                        <td>
                            @foreach($item->special_fors as $key => $special_for)
                                <span class="label label-info">{{ $special_for->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.location') }}
                        </th>
                        <td>
                            {{ $item->location->district ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.price') }}
                        </th>
                        <td>
                            {{ $item->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.rating') }}
                        </th>
                        <td>
                            {{ $item->rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.photo') }}
                        </th>
                        <td>
                            @foreach($item->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.items.index') }}">
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
            <a class="nav-link" href="#item_carts" role="tab" data-toggle="tab">
                {{ trans('cruds.cart.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="item_carts">
            @includeIf('admin.items.relationships.itemCarts', ['carts' => $item->itemCarts])
        </div>
    </div>
</div>

@endsection