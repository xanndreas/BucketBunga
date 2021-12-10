<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Item;
use App\Models\Location;
use App\Models\SpecialFor;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function filter($id, $type)
    {
        if ($type == 'category')
            $items = Item::with(['category', 'colors', 'special_fors', 'location'])->where('category_id',$id)->get();
        if ($type == 'location')
            $items = Item::with(['category', 'colors', 'special_fors', 'location'])->where('location_id',$id)->get();
        if ($type == 'specialFor')
            $items = Item::with(['category', 'colors', 'special_fors', 'location'])->whereHas('special_fors', function($q)
            use($id)
            {
                $q->where('special_for_id', $id);
            })->get();
        if ($type == 'color')
            $items = Item::with(['category', 'colors', 'special_fors', 'location'])->whereHas('colors', function($q)
            use($id)
            {
                $q->where('color_id', $id);
            })->get();

        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        return view('users.product',compact('items','categories','colors','specialFor','locations'));
    }

    public function filterItem(Request $request){
        $filter = $request->input('filter');
        $items = Item::with(['category', 'colors', 'special_fors', 'location'])->where('name','like','%'.$filter.'%')->get();
        $categories = Category::all();
        $colors = Color::all();
        $specialFor = SpecialFor::all();
        $locations = Location::all();
        return view('users.product',compact('items','categories','colors','specialFor','locations'));
    }

}
