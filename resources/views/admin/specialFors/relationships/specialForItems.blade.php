@can('item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.item.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.item.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-specialForItems">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.item.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.color') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.special_for') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.item.fields.rating') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $item->id ?? '' }}
                            </td>
                            <td>
                                {{ $item->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->description ?? '' }}
                            </td>
                            <td>
                                {{ $item->category->name ?? '' }}
                            </td>
                            <td>
                                @foreach($item->colors as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($item->special_fors as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $item->location->district ?? '' }}
                            </td>
                            <td>
                                {{ $item->price ?? '' }}
                            </td>
                            <td>
                                {{ $item->rating ?? '' }}
                            </td>
                            <td>
                                @can('item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.items.show', $item->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('item_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.items.edit', $item->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('item_delete')
                                    <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.items.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-specialForItems:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection