<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Item;
use App\Models\Location;
use App\Models\SpecialFor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::with(['category', 'colors', 'special_fors', 'location'])->latest()->take('8')->get();
        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        $cart = \Cart::getContent();

        return view('users.index',compact('items','categories','colors','specialFor','locations', 'cart'));
    }

    public function detailProduct($id)
    {
        $item = Item::with(['category', 'colors', 'special_fors', 'location'])->where('id',$id)->first();
        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        $cart = \Cart::getContent();

        return view('users.detail-product',compact('cart','item','categories','colors','specialFor','locations'));
    }

    public function myAccount()
    {
        $cart = \Cart::getContent();

        return view('users.contact', compact('cart'));
    }

    public function about()
    {
        $cart = \Cart::getContent();

        return view('users.about', compact('cart'));
    }

    public function login()
    {
        return view('users.login');
    }

    public function storeLogout()
    {
        Auth::logout();
        return redirect('/florist-home');
    }

    public function register()
    {
        return view('users.register');
    }

    public function storeRegister(Request $request){
        $user = User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
            'approved' => '1',
        ]);

        return view('users.login');
    }

    public function product()
    {
        $cart = \Cart::getContent();
        $items = Item::with(['category', 'colors', 'special_fors', 'location'])->get();
        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        return view('users.product',compact('cart', 'items','categories','colors','specialFor','locations'));
    }
}
