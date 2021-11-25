@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cart.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.id') }}
                        </th>
                        <td>
                            {{ $cart->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.item') }}
                        </th>
                        <td>
                            @foreach($cart->items as $key => $item)
                                <span class="label label-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.quantity') }}
                        </th>
                        <td>
                            {{ $cart->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.user') }}
                        </th>
                        <td>
                            @foreach($cart->users as $key => $user)
                                <span class="label label-info">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection