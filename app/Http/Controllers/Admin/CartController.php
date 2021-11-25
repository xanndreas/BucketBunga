<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCartRequest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Cart::with(['items', 'users'])->select(sprintf('%s.*', (new Cart())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'cart_show';
                $editGate = 'cart_edit';
                $deleteGate = 'cart_delete';
                $crudRoutePart = 'carts';

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
            $table->editColumn('item', function ($row) {
                $labels = [];
                foreach ($row->items as $item) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $item->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('user', function ($row) {
                $labels = [];
                foreach ($row->users as $user) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $user->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'item', 'user']);

            return $table->make(true);
        }

        $items = Item::get();
        $users = User::get();

        return view('admin.carts.index', compact('items', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('name', 'id');

        $users = User::pluck('name', 'id');

        return view('admin.carts.create', compact('items', 'users'));
    }

    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());
        $cart->items()->sync($request->input('items', []));
        $cart->users()->sync($request->input('users', []));

        return redirect()->route('admin.carts.index');
    }

    public function edit(Cart $cart)
    {
        abort_if(Gate::denies('cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('name', 'id');

        $users = User::pluck('name', 'id');

        $cart->load('items', 'users');

        return view('admin.carts.edit', compact('items', 'users', 'cart'));
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->all());
        $cart->items()->sync($request->input('items', []));
        $cart->users()->sync($request->input('users', []));

        return redirect()->route('admin.carts.index');
    }

    public function show(Cart $cart)
    {
        abort_if(Gate::denies('cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->load('items', 'users');

        return view('admin.carts.show', compact('cart'));
    }

    public function destroy(Cart $cart)
    {
        abort_if(Gate::denies('cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->delete();

        return back();
    }

    public function massDestroy(MassDestroyCartRequest $request)
    {
        Cart::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
