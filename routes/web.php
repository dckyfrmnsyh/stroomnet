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



Auth::routes(['register' => true]);

// ##route User## //
    // *index
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/users', 'UserController@index')->name('users.index');
    // *thanks
    Route::get('/users/thankyou', 'UserController@thankyou')->name('users.thankyou');
    // *download page
    Route::get('/users/download/new', 'UserController@download')->name('users.download');
    Route::get('/users/download/old', 'UserController@download_old')->name('users.download_old');
    // *download pdf
    Route::get('/users/download/newBAKBB/{id}', 'PDFController@newbakbb')->name('users.pdf1');
    Route::get('/users/download/oldBAKBB/{id}', 'PDFController@oldbakbb')->name('users.pdf2');
    Route::get('/users/download/FB/{id}', 'PDFController@fb')->name('users.pdf3');
    // *delete data
    Route::get('/users/data/delete/{id}', 'UserController@delete');


// ##route Admin## //
    // *index
    Route::get('/Admin/dashboard', 'AdminController@index')->name('dashboard');

    // *orderadmin
    Route::get('/Admin/dashboard/order/new', 'AdminController@order')->name('pages.order');
    Route::get('/Admin/dashboard/order/upgrade', 'AdminController@order2')->name('pages.order2');
    Route::get('/Admin/dashboard/order/downgrade', 'AdminController@order3')->name('pages.order3');
    Route::get('/Admin/dashboard/order/relokasi', 'AdminController@order4')->name('pages.order4');
    Route::get('/Admin/dashboard/order/delete/{id}', 'AdminController@delete_order');

    // *pdf
    Route::get('/Admin/pdf/new/{id}', 'PDFController@newbakbb');
    Route::get('/Admin/pdf/old/{id}', 'PDFController@oldbakbb');
    Route::get('/Admin/pdf/fb/{id}', 'PDFController@fb');

    // *show pdf
    Route::get('/Admin/dashboard/order/show/{id}', 'PDFController@show');
    Route::get('/Admin/dashboard/order/show_old/{id}', 'PDFController@show_old');

// ##route new user## //
    // *customer
    Route::get('/users/new/customer/create', 'CustomerController@create')->name('customer.create');
    Route::post('/users/new/customer/store', 'CustomerController@store')->name('customer.store');
    // *order
    Route::get('/users/new/order/create', 'OrderController@create')->name('order.create');
    Route::post('/users/new/order/store', 'OrderController@store')->name('order.store');
    Route::get('/users/new/order/delete/{id}', 'OrderController@delete');

// ##route old user## //
    // *customer
    Route::get('/users/old/customer/create', 'CustomerController@old_create')->name('customer.old_create');
    Route::post('/users/old/customer/store', 'CustomerController@old_store')->name('customer.old_store');
    // *order
    Route::get('/users/old/order/create', 'OrderController@old_create')->name('order.old_create');
    Route::post('/users/old/order/store', 'OrderController@old_store')->name('order.old_store');
    Route::post('/users/old/order/store2', 'OrderController@old_store_2')->name('order.old_store_2');
    Route::get('/users/old/order/delete/{id}', 'OrderController@old_delete');
    Route::get('/users/old/order/delete/2/{id}', 'OrderController@newold_delete');


// ## Alamat route# //
    Route::get('users/alamat/kota/{id}', 'AlamatController@alamatKota');
    Route::get('users/alamat/kec/{id}', 'AlamatController@alamatKec');
    Route::get('users/alamat/desa/{id}', 'AlamatController@alamatDesa');


