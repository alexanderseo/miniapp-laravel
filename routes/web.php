<?php

use Illuminate\Support\Facades\Route;
use Admin\Products\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin/products/product/add', [Products::class, 'add_product']);
//
//Route::get('/admin/products/product/edit/{id}', [Products::class, 'get_product']);
//
//Route::get('/admin/products/product/index', [Products::class, 'index']);

Route::resource('/products', ProductController::class);
