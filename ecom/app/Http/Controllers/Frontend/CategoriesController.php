<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //    public function parentCategoryItem(){
    //        return view('Frontend.pages.products.category_products');
    //    }
    public function childCategoryItem($id)
    {
        $category = Category::find($id);
        if ($category != NULL) {
            return view('Frontend.pages.categories.category_products', compact('category'));
        } else {
            return redirect()->route('ecom.home');
        }
    }
}
