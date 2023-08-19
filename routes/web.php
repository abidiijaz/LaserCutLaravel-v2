<?php

// use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\AdminController;
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
Auth::routes();
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'/','AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
        Route::get('/dashboard','AdminController@index');

        // For Category
        Route::get('/category','ProductCategoryController@index');
        Route::post('/add-category','ProductCategoryController@AddCategory');
        Route::post('/edit-category','ProductCategoryController@EditCategory');
        Route::post('/update-category','ProductCategoryController@UpdateCategory');
        Route::post('/delete-category','ProductCategoryController@DeleteCategory');
        // End Category Here

         // For Product
         Route::get('/product','ProductController@index');
         Route::post('/add-product','ProductController@AddProduct');
         Route::post('/edit-product','ProductController@EditProduct');
         Route::post('/update-product','ProductControlle@UpdateProduct');
         Route::post('/delete-product','ProductController@DeleteProduct');
         // End Product Here

         // For Orders
         Route::get('/orders','OrderController@index');
        //  Route::post('/add-product','ProductController@AddProduct');
         Route::post('/edit-order','OrderController@EditOrder');
         Route::post('/update-order','OrderController@UpdateOrder');
         Route::post('/delete-category','ProductCategoryController@DeleteCategory');
        // End Orders Here
        Route::get('logout','AdminController@Logout');
        // Slider Section
        Route::get('/slider','SliderController@index');
        Route::post('/add-slider','SliderController@AddSlider');
        Route::post('/edit-slider','SliderController@EditSlider');
        Route::post('/update-slider','SliderController@UpdateSlider');
        Route::post('/delete-slider','SliderController@DeleteSlider');
        Route::post('/update-slider-status', 'SliderController@updateStatus')->name('updateSliderStatus');
        // Populer Section
        Route::get('/populer-category','PopulerCategoryController@index');
        Route::post('/add-populer-category','PopulerCategoryController@AddPopulerCategory');
        // Route::post('/edit-populer-category','PopulerCategoryController@EditPopulerCategory');
        // Route::post('/update-populer-category','PopulerCategoryController@UpdatePopulerCategory');
        Route::post('/delete-populer-category','PopulerCategoryController@DeletePopulerCategory');
        Route::post('/update-populer-category-status', 'PopulerCategoryController@updateStatus')->name('updatePopulerCategoryStatus');
    });
});
// For User Routing
Route::namespace('App\Http\Controllers\User')->group(function(){
    Route::get('/','WelcomeController@index');
    // Route::get('/',function(){
    //     dd(Session::get('cart'));
    // });
    Route::get('/detail-product/{id}','ProductDetailController@index' );
    Route::post('/AddToCart', 'CartController@index');
    Route::get('/view-cart', 'CartController@ViewCart');
    Route::patch('/update-cart','CartController@update');
    Route::delete('/remove-from-cart','CartController@remove');
    // Route::group(['middleware' => ['auth']],function(){
    //     Route::get('/checkout','CheckoutController@index');
    //     Route::post('/place-order','CheckoutController@PlaceOrder');
    //     Route::get('/thankyou',function(){ return view('thankyou'); });
    //     Route::get('/profile','ProfileController@index');
    //     Route::post('/user-view-order', 'CheckoutController@UserOrderView');
    // });
    Route::get('/shop/{keyword}', 'ShopController@index');
    Route::get('/top-search', 'ShopController@TopSearch');
});

// Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/registeration','UserController@registeration');



