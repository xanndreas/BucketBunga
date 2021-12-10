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
        return view('users.index',compact('items','categories','colors','specialFor','locations'));
    }

    public function detailProduct($id)
    {
        $item = Item::with(['category', 'colors', 'special_fors', 'location'])->where('id',$id)->first();
        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        return view('users.detail-product',compact('item','categories','colors','specialFor','locations'));
    }

    public function myAccount()
    {
        return view('users.contact');
    }

    public function about()
    {
        return view('users.about');
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
        $items = Item::with(['category', 'colors', 'special_fors', 'location'])->get();
        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        return view('users.product',compact('items','categories','colors','specialFor','locations'));
    }
}
