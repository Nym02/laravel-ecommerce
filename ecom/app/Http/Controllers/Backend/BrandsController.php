<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\brands;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;


class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brands::orderBy('name','asc')->get();
        return view('Backend.pages.brands.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'brandName'=> 'required|max:255'
        ],[
            'brandName.required' => 'Please provide your name'
        ]);

        $brand = new brands();
        $brand->name= $request->brandName;
        $brand->desc= $request->brandDesc;

        if($request->brandLogo){
            $image = $request->file('brandLogo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('Backend/img/Brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();
        return redirect()->route('brands.manage');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brands::find($id);

        if(!is_null($brand)){
            return view('Backend.pages.brands.edit', compact('brand'));
        } else{
            return route('brands.manage');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'brandName'=> 'required|max:255'
        ],[
            'brandName.required' => 'Please provide your name'
        ]);

        $brand = brands::find($id);
        $brand->name= $request->brandName;
        $brand->desc= $request->brandDesc;

        if($request->brandLogo){
            if(File::exists('Backend/img/Brands/' . $brand->image)){
                File::delete('Backend/img/Brands/' . $brand->image);
            }
            $image = $request->file('brandLogo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('Backend/img/Brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();
        return redirect()->route('brands.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = brands::find($id);

        if(!is_null($brand)){
            if(File::exists('Backend/img/Brands/' . $brand->image)){
                File::delete('Backend/img/Brands/' . $brand->image);
            }
            $brand->delete();
            return redirect()->route('brands.manage');
        } else{
            return redirect()->route('brands.manage');
        }
    }
}
