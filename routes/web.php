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
// Global Route
Route::group(['middleware'=>['web']],function(){

    Auth::routes(['register' => false]);

    // *index
    Route::get('/', 'UserController@index')->name('users.index');
    // ##route User## //
    
    Route::get('/users', 'UserController@index')->name('users.index');

    // ## Alamat route# //
    Route::get('users/alamat/kota/{id}', 'AlamatController@alamatKota');
    Route::get('users/alamat/kec/{id}', 'AlamatController@alamatKec');
    Route::get('users/alamat/desa/{id}', 'AlamatController@alamatDesa');    

});

// Only Customer, Sales & Admin Route
Route::group(['middleware'=>['role:customer|sales|admin']],function(){
    
});

// only Sales & Admin Route
Route::group(['middleware'=>['role:sales|admin']],function(){
    // *index
    Route::get('/Admin/dashboard', 'AdminController@index')->name('dashboard');

    // *sales dashboard
    Route::get('/Admin/sales/dashboard', 'AdminController@sales_dashboard')->name('sales.dashboard');

    // *pdf
    Route::get('/Admin/pdf/new/{id}', 'PDFController@newbakbb');
    Route::get('/Admin/pdf/old/{id}', 'PDFController@oldbakbb');
    Route::get('/Admin/pdf/fb/{id}', 'PDFController@fb');

    // *show pdf
    Route::get('/Admin/dashboard/order/show/{id}', 'PDFController@show');
    Route::get('/Admin/dashboard/order/show_old/{id}', 'PDFController@show_old');

    Route::get('/Admin/customer', 'AdminController@customer')->name('customer');
    Route::get('/Admin/customer/create/FB/{id}', 'AdminController@createfb')->name('customer.createfb');
    Route::post('/Admin/customer/store/FB/{id}', 'AdminController@storefb')->name('customer.storefb');
    Route::get('/Admin/customer/show/FB/{id}', 'AdminController@showfb')->name('customer.showfb');
    Route::post('/Admin/customer/update/FB/{id}', 'AdminController@updatefb')->name('customer.updatefb');
    Route::post('/Admin/customer/acc_store', 'AdminController@acc_store')->name('customer.acc_store');
    Route::post('/Admin/customer/acc_update/{id}', 'AdminController@acc_update')->name('customer.acc_update');
    Route::get('/Admin/customer/acc_edit/{id}', 'AdminController@acc_edit')->name('customer.acc_edit');
    Route::get('/Admin/customer/download/FB/{id}', 'PDFController@fb')->name('customer.down_fb');

    Route::get('/Admin/beranda', 'AdminController@beranda')->name('beranda');
    Route::get('/Admin/order', 'AdminController@view_order_all')->name('order.all');

    Route::get('/Admin/order/edit/{id}', 'AdminController@edit_list_order')->name('order.edit');
    Route::post('/Admin/order/update/{id}/data', 'AdminController@update_data')->name('order.update_data');
    Route::post('/Admin/order/update/{id}/layanan/new', 'AdminController@update_layanan1')->name('order.update_layanan1');
    Route::post('/Admin/order/update/{id}/layanan/existing', 'AdminController@update_layanan2')->name('order.update_layanan2');
    Route::get('/Admin/order/delete/{id}/layanan/new', 'AdminController@delete_layanan')->name('order.delete_layanan1');
    Route::get('/Admin/order/delete/{id}/layanan/exist', 'AdminController@delete_layanan')->name('order.delete_layanan2');

    Route::get('/Admin/order/download/BAKBB/{id}', 'PDFController@bakbb')->name('order.down_bakbb');
    Route::get('/Admin/order/show/BAKBB/{id}', 'PDFController@showbakbb')->name('order.show_bakbb');

    Route::get('/Admin/order/delete/{id}', 'AdminController@delete_list_order')->name('order.delete');

    Route::get('/Admin/order/search', 'AdminController@search')->name('order.search');
    Route::get('/Admin/order/search/action', 'AdminController@action_search')->name('order.action_search');
    Route::post('/Admin/sales/action', 'AdminController@sales_datefilter')->name('sales_datefilter');
    Route::get('/Admin/sales/date/filter', 'AdminController@datesalesfilter')->name('datesalesfilter');

    Route::get('/Admin/order/create/{id}/BAKBB/new', 'AdminController@bakbb_new')->name('order.bakbb_new');
    Route::post('/Admin/order/store/{id}/BAKBB/new', 'AdminController@store_bakbb_new')->name('order.store_bakbb_new');
    Route::get('/Admin/order/delete/{id}/BAKBB/new', 'AdminController@delete_new')->name('order.delete_new');
    Route::post('/Admin/order/store/{id}/data/new', 'AdminController@store_data_order')->name('order.store_data_order');

    Route::get('/Admin/order/create/{id}/BAKBB/existing', 'AdminController@bakbb_existing')->name('order.bakbb_existing');
    Route::post('/Admin/order/store/{id}/BAKBB/existing', 'AdminController@store_bakbb_existing')->name('order.store_bakbb_existing');
    Route::post('/Admin/order/store/2/{id}/BAKBB/existing', 'AdminController@store_bakbb_newexisting')->name('order.store_bakbb_newexisting');
    Route::get('/Admin/order/delete/{id}/BAKBB/1/existing', 'AdminController@delete_newexisting')->name('order.delete_newexisting');
    Route::get('/Admin/order/delete/{id}/BAKBB/2/existing', 'AdminController@delete_existing')->name('order.delete_existing');
    Route::post('/Admin/order/store/{id}/data/existing', 'AdminController@store_data_order_existing')->name('order.store_data_order_existing');


    Route::get('/excel/user', 'ExcelController@user');
    Route::get('/excel/fb', 'ExcelController@fb');
    Route::get('/excel/bakbb', 'ExcelController@bakbb');
    Route::get('/excel/sales/dashboard', 'ExcelController@sales_dashboard');
    Route::get('/excel/sales/filter2', 'ExcelController@sales_filter2');
    Route::get('/excel/sales/filter3', 'ExcelController@sales_filter3');
});

// Only Sales route
Route::group(['middleware'=>['role:sales']],function(){

});

// Only Admin route
Route::group(['middleware'=>['role:admin']],function(){
    Route::get('/Admin/user', 'AdminController@user')->name('user');
    Route::get('/Admin/data/edit', 'AdminController@data_icon_edit')->name('data.icons');
    Route::post('/Admin/data/update', 'AdminController@data_icon_update')->name('data.icons.update');
    Route::post('/Admin/user/store', 'AdminController@user_store')->name('customer.user_store');
    Route::get('/Admin/user/edit/{id}', 'AdminController@user_edit')->name('customer.user_edit');
    Route::post('/Admin/user/update/{id}', 'AdminController@user_update')->name('customer.user_update');
    Route::get('/Admin/user/delete/{id}', 'AdminController@user_delete')->name('customer.user_delete');
    Route::get('/Admin/customer/delete/{id}', 'AdminController@user_delete')->name('customer.user_delete');
});

// Only Customer route
Route::group(['middleware'=>['role:customer']],function(){
    Route::get('/users/profile', 'UserController@profile')->name('users.profile');

    Route::get('/users/profile/fb/show', 'UserController@showfb')->name('users.showfb');
    Route::get('/users/profile/fb/download', 'PDFController@fb_user')->name('users.downfb');
    Route::get('/users/profile/fb/create', 'UserController@createfb')->name('users.createfb');
    Route::post('/users/profile/fb/store', 'UserController@storefb')->name('users.storefb');
    Route::get('/users/profile/fb/edit', 'UserController@editfb')->name('users.editfb');
    Route::post('/users/profile/fb/update', 'UserController@updatefb')->name('users.updatefb');

    Route::get('/users/profile/bakbb/create/new', 'UserController@bakbb_new')->name('users.bakbb_new');
    Route::get('/users/profile/bakbb/create/exist', 'UserController@bakbb_exist')->name('users.bakbb_exist');
    Route::get('/users/profile/bakbb/delete/{id}', 'UserController@delete')->name('users.delete');
    Route::post('/users/profile/bakbb/store/data', 'UserController@store_data')->name('users.store_data');
    Route::post('/users/profile/bakbb/store/layanan/new', 'UserController@store_new')->name('users.store_new');
    Route::post('/users/profile/bakbb/store/layanan/existing', 'UserController@store_exist')->name('users.store_exist');

    Route::get('/users/profile/bakbb/edit/{id}', 'UserController@edit_bakbb')->name('users.edit_bakbb');
    Route::post('/users/profile/bakbb/update/data/{id}', 'UserController@update_data')->name('users.update_data');
    Route::post('/users/profile/bakbb/update/layanan/new/{id}', 'UserController@update_new')->name('users.update_new');
    Route::post('/users/profile/bakbb/update/layanan/existing/{id}', 'UserController@update_exist')->name('users.update_exist');

    Route::get('/users/profile/bakbb/show/{id}', 'PDFController@show_bakbb');
    Route::get('/users/profile/bakbb/download/{id}', 'PDFController@bakbb');
});








