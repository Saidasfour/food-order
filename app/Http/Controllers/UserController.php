<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Food;
use App\Models\Orders;
use App\Models\Category;
use Illuminate\Http\Request;


class UserController extends Controller
 
{
    public function show(){
     
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
        return view('/user.index',[
            'categories'=>Category::all()->where('featured','Yes'),
            'foods'=>Food::all()->where('featured','Yes')->where('active','Yes'),
            'bagscount'=>$bagscount
        ]);
    }

    public function showfoods(){
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
        return view('/user.foods',[
            'foods'=>Food::all()->where('active','Yes'),
            'bagscount'=>$bagscount
        ]);
    }

    public function showcategories(){
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
        return view('/user.categories',[
            'categories'=>Category::all()->where('active','Yes'),
            'bagscount'=>$bagscount
        ]);
    }

    public function showcategoryfood(Category $category){
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
        return view('user.category-foods',[

            'category'=>$category,
            'foods'=>Food::all()->where('category_id',$category['id']),
            'bagscount'=>$bagscount
        ]);
    }

    public function search(Request $request){
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
//dd($request->all());
        return view('/user.search',[
            'search'=>$request->search,
            'foods'=>Food::where('title','like','%'.$request['search'].'%')->get(),
            'bagscount'=>$bagscount
        ]);
    }

    public function ordersinfo(){
        $user=auth()->user()->id;
        
        $bagsitems=Bag::all();
        $bagscount = $bagsitems->count();
        return view('user.ordersinfo',[
            'orders'=>Orders::join('orderitems_tbl','orders_tbl.id','=','orderitems_tbl.order_id')
            ->join('users','users.id','=','orders_tbl.user_id')
            ->select('orders_tbl.id as id','users.username as username','orderitems_tbl.title as title','orderitems_tbl.price as price','orderitems_tbl.status as status','users.location as location')
            ->where('accepted','Yes')
            ->where('user_id',$user)
            ->get(),
            
            'bagscount'=>$bagscount
        ]);
    }
}
