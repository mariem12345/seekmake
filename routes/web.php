<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','IndexController@index');

Route::match(['get', 'post'], '/seekmakeadminprivate','AdminController@login');

Auth::routes();

Route::get('/home', 'IndexController@index')->name('home');

// Category/Listing Page
Route::get('/products/{url}','ProductsController@products');

// Product Detail Page
Route::get('/product/{id}','ProductsController@product');

// Cart Page
Route::match(['get', 'post'],'/cart','ProductsController@cart');

// Add to Cart Route
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

// Delete Product from Cart Route
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

// Update Product Quantity from Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

// Get Product Attribute Price
Route::any('/get-product-price','ProductsController@getProductPrice');

// Apply Coupon
//Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

// Users Login/Register Page
Route::get('/login-register','UsersController@userLoginRegister');

// Users Register Form Submit
Route::post('/user-register','UsersController@register');

// Confirm Account
Route::get('confirm/{code}','UsersController@confirmAccount');

// Users Login Form Submit
Route::post('user-login','UsersController@login');

// Users logout
Route::get('/user-logout','UsersController@logout'); 

// Search Products
Route::post('/search-products','ProductsController@searchProducts');
Route::get('/search-products','ProductsController@searchProducts');

// All Routes after Login
Route::group(['middleware'=>['frontlogin']],function(){
	// Users Account Page
	Route::match(['get','post'],'account','UsersController@account');
	// Check User Current Password
	Route::get('/check-user-pwd','UsersController@chkUserPassword');
	// Update User Password
	Route::post('/update-user-pwd','UsersController@updatePassword');

	// Checkout Page
	Route::match(['get','post'],'checkout','ProductsController@checkout');
	// Order Review Page
	Route::match(['get','post'],'/order-review','ProductsController@orderReview');
	// Place Order
	Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
	// Thanks Page
	Route::get('/thanks','ProductsController@thanks');
	// Paypal Page
	//Route::get('/paypal','ProductsController@paypal');
	// Users Orders Page
	Route::get('/orders','ProductsController@userOrders');
	// User Ordered Products Page
	Route::get('/orders/{id}','ProductsController@userOrderDetails');
	// Paypal Thanks Page
	//Route::get('/paypal/thanks','ProductsController@thanksPaypal');
	// Paypal Cancel Page
	//Route::get('/paypal/cancel','ProductsController@cancelPaypal');
});


// Check if User already exists
//Route::match(['GET','POST'],'/check-email','UsersController@checkEmail');

Route::group(['middleware' => ['adminlogin']], function () {
	Route::get('/seekmakeadminprivate/dashboard','AdminController@dashboard');	
	Route::get('/seekmakeadminprivate/settings','AdminController@settings');
	Route::get('/seekmakeadminprivate/check-pwd','AdminController@chkPassword');
	Route::match(['get', 'post'],'/seekmakeadminprivate/update-pwd','AdminController@updatePassword');

	// Admin Categories Routes
	Route::match(['get', 'post'], '/seekmakeadminprivate/add-category','CategoryController@addCategory');
	Route::match(['get', 'post'], '/seekmakeadminprivate/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get', 'post'], '/seekmakeadminprivate/delete-category/{id}','CategoryController@deleteCategory');
	Route::get('/seekmakeadminprivate/view-categories','CategoryController@viewCategories');

	// Admin Products Routes
	Route::match(['get','post'],'/seekmakeadminprivate/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/seekmakeadminprivate/edit-product/{id}','ProductsController@editProduct');
	Route::get('/seekmakeadminprivate/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/seekmakeadminprivate/view-products','ProductsController@viewProducts');
	Route::get('/seekmakeadminprivate/delete-product-image/{id}','ProductsController@deleteProductImage');
	
	Route::match(['get', 'post'], '/seekmakeadminprivate/add-images/{id}','ProductsController@addImages');
	Route::get('/seekmakeadminprivate/delete-alt-image/{id}','ProductsController@deleteProductAltImage');

	// Admin Attributes Routes
	Route::match(['get', 'post'], '/seekmakeadminprivate/add-attributes/{id}','ProductsController@addAttributes');
	Route::match(['get', 'post'], '/seekmakeadminprivate/edit-attributes/{id}','ProductsController@editAttributes');
	Route::get('/seekmakeadminprivate/delete-attribute/{id}','ProductsController@deleteAttribute');

	// Admin Coupon Routes
	//Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
	//Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
	//Route::get('/admin/view-coupons','CouponsController@viewCoupons');
	//Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');

	// Admin Banners Routes
	Route::match(['get','post'],'/seekmakeadminprivate/add-banner','BannersController@addBanner');
	Route::match(['get','post'],'/seekmakeadminprivate/edit-banner/{id}','BannersController@editBanner');
	Route::get('seekmakeadminprivate/view-banners','BannersController@viewBanners');
	Route::get('/seekmakeadminprivate/delete-banner/{id}','BannersController@deleteBanner');

	// Admin Orders Routes
	Route::get('/seekmakeadminprivate/view-orders','ProductsController@viewOrders');

	// Admin Order Details Route
	Route::get('/seekmakeadminprivate/view-order/{id}','ProductsController@viewOrderDetails');

	// Update Order Status
	Route::post('/seekmakeadminprivate/update-order-status','ProductsController@updateOrderStatus');

	// Admin Users Route
	Route::get('/seekmakeadminprivate/view-users','UsersController@viewUsers');
});


Route::get('/logout','AdminController@logout');




Auth::routes();

