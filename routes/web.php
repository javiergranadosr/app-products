<?php



Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('products', 'API\ProductController');
