<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
//    public function parentCategoryItem(){
//        return view('Frontend.pages.products.category_products');
//    }
    public function childCategoryItem(){
        return view('Frontend.pages.categories.category_products');
    }
}
