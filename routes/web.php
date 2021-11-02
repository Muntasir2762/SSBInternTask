<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Frontend Website Routes Are Here
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Frontend\PagesController@index')->name('homepage');

Route::group(['prefix'=>'products'],function(){

Route::get('/', 'App\Http\Controllers\Frontend\PagesController@products')->name('allProducts');
Route::get('/{slug}', 'App\Http\Controllers\Frontend\PagesController@productshow')->name('product.show');
Route::get('/category', 'App\Http\Controllers\Frontend\PagesController@productcategory')->name('product.category');
Route::get('/category/{slug}', 'App\Http\Controllers\Frontend\PagesController@categoryshow')->name('category.show');

});

//Product Search....
Route::get('/search','App\Http\Controllers\Frontend\PagesController@search')->name('search');

Route::group(['prefix'=>'cart'],function(){

Route::get('/', 'App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
Route::Post('/store', 'App\Http\Controllers\Frontend\CartController@store')->name('cart.store');
Route::Post('/update/{id}', 'App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
Route::Post('/destroy/{id}', 'App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');

});

Route::group(['prefix'=>'checkout'],function(){

Route::get('/', 'App\Http\Controllers\Frontend\OrderController@index')->name('checkout.page');
Route::Post('/store', 'App\Http\Controllers\Frontend\OrderController@store')->name('order.store');

});


/*Route::get('/login', 'App\Http\Controllers\Frontend\PagesController@login')->name('login');
Route::get('/registration', 'App\Http\Controllers\Frontend\PagesController@registration')->name('registration');
*/


/*
|--------------------------------------------------------------------------
| Backend Admin Routes Are Here
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

/*Route::get('/', function () {
   return view('welcome');
});
*/
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

*/




Route::group(['prefix' => 'admin'], function(){
	Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@index')->middleware(['auth'])->name('dashboard');

		// Brand Route For CRUD
	Route::group(['prefix' => 'brand'], function (){
		Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');

		Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->name('brand.create');
		Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@update')->name('brand.update');
		Route::post('/delete/{id}', 'App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy');
	});

	// Category Route For CRUD
	Route::group(['prefix' => 'category'], function (){
		Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');
		
		Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('category.create');
		Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('category.update');
		Route::post('/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy');
	});

	// Product Route For CRUD
	Route::group(['prefix' => 'product'], function (){
		Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('product.manage');
		
		Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('product.create');
		Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->name('product.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('product.update');
		Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->name('product.destroy');
	});

	// Division
	Route::group(['prefix' => 'division'], function (){
		Route::get('/manage', 'App\Http\Controllers\Backend\DivisionController@index')->name('division.manage');

		Route::get('/create', 'App\Http\Controllers\Backend\DivisionController@create')->name('division.create');
		Route::post('/store', 'App\Http\Controllers\Backend\DivisionController@store')->name('division.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DivisionController@edit')->name('division.edit');
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\DivisionController@update')->name('division.update');
		Route::post('/delete/{id}', 'App\Http\Controllers\Backend\DivisionController@destroy')->name('division.destroy');
	});


	// District
	Route::group(['prefix' => 'district'], function (){
		Route::get('/manage', 'App\Http\Controllers\Backend\DistrictController@index')->name('district.manage');
		Route::get('/create', 'App\Http\Controllers\Backend\DistrictController@create')->name('district.create');
		Route::post('/store', 'App\Http\Controllers\Backend\DistrictController@store')->name('district.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DistrictController@edit')->name('district.edit');
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\DistrictController@update')->name('district.update');
		Route::post('/delete/{id}', 'App\Http\Controllers\Backend\DistrictController@destroy')->name('district.destroy');
	});


	Route::group(['prefix' => 'slider'], function (){
		Route::get('/manage', 'App\Http\Controllers\Backend\SliderController@index')->name('slider.manage');
		Route::get('/create', 'App\Http\Controllers\Backend\SliderController@create')->name('slider.create');
		Route::post('/store', 'App\Http\Controllers\Backend\SliderController@store')->name('slider.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SliderController@edit')->name('slider.edit');
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\SliderController@update')->name('slider.update');
		Route::post('/delete/{id}', 'App\Http\Controllers\Backend\SliderController@destroy')->name('slider.destroy');
	});
});
