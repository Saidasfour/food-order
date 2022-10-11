<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Food;
use Illuminate\Http\Request;

class BagController extends Controller
{
    public function create(Food $food){

        $formFields=([
            'category_id'=>$food['category_id'],
            'title'=>$food['title'],
            'description'=>$food['description'],
            'price'=>$food['price'],
            'image'=>$food['image'],
            'featured'=>$food['featured'],
            'active'=>$food['active']
            
        ]);

        Bag::create($formFields);
        return back();

    }

    public function showcart(){
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
        return view('user.cart',[
            'foods'=>Bag::all(),
            'bagscount'=>$bagscount
        ]);
    }

    public function remove(Bag $food){
        $food->delete();
        return back();
    }
}
