<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        return view('admin.food.index',[
            'foods'=>Food::all()
        ]);
    }

    public function create(){
        return view('admin.food.create',[
            'categories'=>Category::all()
        ]);
    }


    public function store(Request $request){
        //dd($request->all());
        $title=$request->title;
        $description=$request->description;
        $price=$request->price;
        $category=$request->category;
        if($request->featured=='on'){
            $featured="Yes";
        }else{
            $featured="No";
        }

        if($request->active=='on'){
            $active="Yes";
        }else{
            $active="No";
        }

        

        $formFields=([
            'category_id'=>$category,
            'title'=>$title,
            'description'=>$description,
            'price'=>$price,
            'image'=>'',
            'featured'=>$featured,
            'active'=>$active
            
        ]);

        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('images','public');
        }

        Food::create($formFields);
        return redirect('/foods')->with('message','Food created successfully');
    }

    public function edit(Food $food){

        //dd($category->title);
    
        return view('admin.food.edit',[
            'food'=>$food,
            'categories'=>Category::all()
        ]);
    }

    public function update(Request $request,Food $food){
        //dd($request->all());
        $title=$request->title;
        $description=$request->description;
        $price=$request->price;
        $category=$request->category;
        if($request->featured=='on'){
            $featured="Yes";
        }else{
            $featured="No";
        }

        if($request->active=='on'){
            $active="Yes";
        }else{
            $active="No";
        }

        

        $formFields=([
            'category_id'=>$category,
            'title'=>$title,
            'description'=>$description,
            'price'=>$price,
            'image'=>'',
            'featured'=>$featured,
            'active'=>$active
            
        ]);

        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('images','public');
        }else{
            if($request->oldimage!=""){
                $formFields['image']=$request->oldimage;
            }
        }

        $food->update($formFields);
        return redirect('/foods')->with('message','Food updated successfully');
    }

    public function destroy(Food $food){

        $food->delete();
        return redirect('/foods')->with('message','Food deleted successfully');
    
    }

}
