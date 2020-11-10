<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\brands;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use File;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('cat_name', 'asc')->get();
        return view('Backend.pages.categories.manage', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_category = Category::orderBy('cat_name', 'asc')->where('parent_id', 0)->get();
        return view('Backend.pages.categories.create', compact('primary_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName'=> 'required|max:255'
        ],[
            'categoryName.required' => 'Please provide your category name'
        ]);

        $category = new Category();
        $category->cat_name= $request->categoryName;
        $category->cat_description= $request->categoryDesc;

        if($request->categoryLogo){
            $image = $request->file('categoryLogo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('Backend/img/category/' . $img);
            Image::make($image)->save($location);
            $category->cat_thumbnail = $img;
        }

        $category->parent_id = $request->categoryParent;
        $category->save();
        return redirect()->route('category.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $primary_category = Category::orderBy('cat_name', 'asc')->where('parent_id', 0)->get();
        $category = Category::find($id);

        if(!is_null($category)){
            return view('Backend.pages.categories.edit', compact('category','primary_category'));
        } else{
            return route('category.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            [
                'categoryName' => 'required' | 'max:255'
            ],
            [
                'categoryName.required' => 'Please provide your category name'
            ]
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->categoryName;
        $category->parent_id = $request->categoryParent;
        $category->cat_description = $request->categoryDesc;

        if($request->categoryLogo){
            if(File::exists('Backend/img/category/'. $category->cat_thumbnail)){
                File::delete('Backend/img/category/'. $category->cat_thumbnail);
            }
            $image = $request->file('categoryLogo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('Backend/img/category/' . $img);
            Image::make($image)->save($location);
            $category->cat_thumbnail = $img;
        }
        $category->save();
        return redirect()->route('category.manage');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(!is_null($category)){
            if(File::exists('Backend/img/category/' . $category->cat_thumbnail)){
                File::delete('Backend/img/category/' . $category->cat_thumbnail);
            }
            $category->delete();
            return redirect()->route('category.manage');

        } else{
            return redirect()->route('category.manage');
        }
    }
}
