<?php
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'App\Http\Controllers\Backend\pageController@dashboard')->name('admin.dashboard');

    Route::group(['prefix' => '/brands'], function(){
       Route::get('/manage','App\Http\Controllers\Backend\BrandsController@index')->name('brands.manage');
    });

});

