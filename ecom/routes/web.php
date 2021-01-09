<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\pageController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\CategoriesController;


use App\Http\Livewire\User\UserDashboardComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [PagesController::class, 'index'])->name('ecom.home');

Route::group(['prefix' => '/products'], function () {
    Route::get('/', [ProductsController::class, 'products'])->name('ecom.products');
    Route::get('/{product_slug}', [ProductsController::class, 'productDetails'])->name('ecom.productDetails');
});

Route::group(['prefix' => '/category'], function () {
    Route::get('/', [CategoriesController::class, 'parentCategoryItem'])->name('category.allItem');
    Route::get('/{id}', [CategoriesController::class, 'childCategoryItem'])->name('category.childItem');
});

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */







// Admin Middleware 

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    // Route::get('/admin/dashboard', [pageController::class, 'dashboard'])->name('admin.dashboard');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [pageController::class, 'dashboard'])->name('admin.dashboard');

        Route::group(['prefix' => '/brands'], function () {
            Route::get('/manage', [BrandsController::class, 'index'])->name('brands.manage');
            Route::get('/create', [BrandsController::class, 'create'])->name('brands.create');
            Route::post('/store', [BrandsController::class, 'store'])->name('brands.store');
            Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
            Route::post('edit/{id}', [BrandsController::class, 'update'])->name('brands.update');
            Route::post('destroy/{id}', [BrandsController::class, 'destroy'])->name('brands.destroy');
        });

        //    category routes
        Route::group(['prefix' => '/category'], function () {
            Route::get('/manage', [CategoryController::class, 'index'])->name('category.manage');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('edit/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::post('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        });
        //    product routes
        Route::group(['prefix' => '/product'], function () {
            Route::get('/manage', [ProductController::class, 'index'])->name('product.manage');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('edit/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::post('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        });
        //    division routes
        Route::group(['prefix' => '/division'], function () {
            Route::get('/manage', [DivisionController::class, 'index'])->name('division.manage');
            Route::get('/create', [DivisionController::class, 'create'])->name('division.create');
            Route::post('/store', [DivisionController::class, 'store'])->name('division.store');
            Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
            Route::post('edit/{id}', [DivisionController::class, 'update'])->name('division.update');
            Route::post('destroy/{id}', [DivisionController::class, 'destroy'])->name('division.destroy');
        });
        //    division routes
        Route::group(['prefix' => '/district'], function () {
            Route::get('/manage', [DistrictController::class, 'index'])->name('district.manage');
            Route::get('/create', [DistrictController::class, 'create'])->name('district.create');
            Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
            Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
            Route::post('edit/{id}', [DistrictController::class, 'update'])->name('district.update');
            Route::post('destroy/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');
        });
    });
});

// User Middleware 

Route::middleware(['auth:sanctum', 'verified', 'authuser'])->group(function () {
    Route::get('/user/profile', [UserDashboardComponent::class, 'render'])->name('user.profile');
});
