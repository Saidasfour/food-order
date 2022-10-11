<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    
    public function index(){
        return view('admin.category.index',[
            'categories'=>Category::all()
        ]);
    }
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $title=$request->title;
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
            'title'=>$title,
            'image'=>'',
            'featured'=>$featured,
            'active'=>$active
            
        ]);

        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('images','public');
        }

        Category::create($formFields);
        return redirect('/categories')->with('message','Category created successfully');
    }

public function edit(Category $category){

    //dd($category->title);

    return view('admin.category.edit',[
        'category'=>$category
    ]);
}

public function update(Request $request,Category $category){
    //dd($request->all());
    $title=$request->title;
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
        'title'=>$title,
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

    $category->update($formFields);
    return redirect('/categories')->with('message','Category updated successfully');
}

public function destroy(Category $category){

    $category->delete();
    return redirect('/categories')->with('message','Category deleted successfully');

}

}
