<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use App\Models\Backend\Category;
use App\Models\Backend\brands;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
use phpDocumentor\Reflection\Types\Null_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list = Product::orderBy('product_title', 'desc')->get();
        return view('Backend.pages.products.manage', compact('product_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategory = Category::orderBy('cat_name', 'asc')->where('parent_id', 0)->get();
        $productBrand = brands::orderBy('name', 'asc')->get();
        return view('Backend.pages.products.create', compact('productCategory', 'productBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'productTitle' => 'required | max:255',
            'productRegularPrice' => 'required | numeric'
        ], [
            'productTitle.required' => 'Please provide product title',
            'productRegularPrice.required' => 'Please provide product price',
        ]);

        $product = new Product();

        $product->product_title = $request->productTitle;
        $product->product_price = $request->productRegularPrice;
        $product->product_category_id = $request->productCategory;
        $product->product_brand_id = $request->productBrand;
        $product->product_offer_price = $request->productOfferPrice;
        $product->product_slug = Str::slug($request->productTitle);
        $product->product_quantity = $request->productQuantity;
        $product->product_status = $request->productStatus;
        $product->is_featured = $request->isFeatured;
        $product->product_tag = $request->productTags;
        $product->product_shortDescription = $request->shortDescription;
        $product->product_description = $request->productDescription;
        $product->save();

        // if (count($request->productThumbnail) > 0) {
        //     foreach ($request->productThumbnail as $productImg) {
        //         $img = uniqid() . "." . $productImg->getClientOriginalExtension();
        //         $location = public_path('Backend/img/products/' . $img);
        //         Image::make($productImg)->resize(700, 700)->save($location);

        //         $p_img = new ProductImage();
        //         $p_img->product_id = $product->id;
        //         $p_img->product_image = $img;
        //         $p_img->save();
        //     }
        // }
        return redirect()->route('product.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = Category::orderBy('cat_name', 'asc')->where('parent_id', 0)->get();
        $productBrand = brands::orderBy('name', 'asc')->get();
        $editProduct = Product::find($id);
        if (!is_null($editProduct)) {
            return view('Backend.pages.products.edit', compact('editProduct', 'productCategory', 'productBrand'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'productTitle' => 'required | max:255',
            'productRegularPrice' => 'required | numeric'
        ], [
            'productTitle.required' => 'Please provide product title',
            'productRegularPrice.required' => 'Please provide product price',
        ]);

        $product = Product::find($id);
        $productImg = ProductImage::where('product_id', $product->id)->get();

        $product->product_title = $request->productTitle;
        $product->product_price = $request->productRegularPrice;
        $product->product_category_id = $request->productCategory;
        $product->product_brand_id = $request->productBrand;
        $product->product_offer_price = $request->productOfferPrice;
        $product->product_slug = Str::slug($request->productTitle);
        $product->product_quantity = $request->productQuantity;
        $product->product_status = $request->productStatus;
        $product->is_featured = $request->isFeatured;
        $product->product_tag = $request->productTags;
        $product->product_shortDescription = $request->shortDescription;
        $product->product_description = $request->productDescription;
        $product->save();




        // if (count($request->productThumbnail) > 0) {

        //     foreach ($productImg as $pImg) {
        //         if (File::exists('Backend/img/products/' . $pImg->product_image)) {
        //             File::delete('Backend/img/products/' . $pImg->product_image);
        //         }
        //         $pImg->delete();
        //     }
        //     foreach ($request->productThumbnail as $productImg) {
        //         $img = uniqid() . "." . $productImg->getClientOriginalExtension();
        //         $location = public_path('Backend/img/products/' . $img);
        //         Image::make($productImg)->resize(700, 700)->save($location);

        //         $p_img = new ProductImage();
        //         $p_img->product_id = $product->id;
        //         $p_img->product_image = $img;
        //         $p_img->save();
        //     }
        // }

        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $productImg = ProductImage::where('product_id', $product->id)->get();
        if (!is_null($product)) {
            foreach ($productImg as $pImg) {
                if (File::exists('Backend/img/products/' . $pImg->product_image)) {
                    File::delete('Backend/img/products/' . $pImg->product_image);
                }
            }
            $product->delete();
            return redirect()->route('product.manage');
        } else {
            return redirect()->route('product.manage');
        }
    }
}
