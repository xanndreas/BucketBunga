@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cart.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="items">{{ trans('cruds.cart.fields.item') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('items') ? 'is-invalid' : '' }}" name="items[]" id="items" multiple>
                    @foreach($items as $id => $item)
                        <option value="{{ $id }}" {{ in_array($id, old('items', [])) ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @if($errors->has('items'))
                    <div class="invalid-feedback">
                        {{ $errors->first('items') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.cart.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="users">{{ trans('cruds.cart.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ in_array($id, old('users', [])) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection