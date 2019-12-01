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


Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix'=> 'category'],function(){
        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create','AdminCategoryController@store');
        Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}','AdminCategoryController@update');
        Route::post('/action/{action}/{id}','AdminCategoryController@action')->name('admin.ajax.action.category');
        Route::post('/action/{actionAll}','AdminCategoryController@action')->name('admin.ajax.actionAll.category');
        Route::post('/check_comp','AdminCategoryController@check_comp')->name('admin.ajax.checkcomp.category');
    });

    Route::group(['prefix'=> 'product'],function(){
        Route::get('/','AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}','AdminProductController@update');
        Route::get('/action/{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
     
    });

    Route::group(['prefix'=> 'attrProduct'],function(){
        Route::get('/','AdminAttrProductController@index')->name('admin.get.list.attr.product');
        Route::get('/create','AdminAttrProductController@create')->name('admin.get.create.attr.product');
        Route::post('/create','AdminAttrProductController@store')->name('admin.post.create.attr.product');
        Route::get('/update/{id}','AdminAttrProductController@edit')->name('admin.get.edit.attr.product');
        Route::post('/update/{id}','AdminAttrProductController@update')->name('admin.ajax.edit.attr.product');;
        Route::get('/action/{action}/{id}','AdminAttrProductController@action')->name('admin.get.action.attr.product');
        Route::post('/action/{action}/{id}','AdminAttrProductController@action')->name('admin.ajax.action.attr.product');
        Route::post('/action/{actionAll}','AdminAttrProductController@action')->name('admin.ajax.actionAll.attr.product');
     
    });

    Route::group(['prefix'=> 'article'],function(){
        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('/action/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');
     
    });

    // quan lý don hang
    Route::group(['prefix'=> 'trasaction'],function(){
        Route::get('/','AdminTrasactionController@index')->name('admin.get.list.trasaction');
        Route::get('/view/{id}','AdminTrasactionController@viewOrder')->name('admin.get.view.order');
        Route::get('/action/{action}/{id}','AdminTrasactionController@action')->name('admin.get.action.transaction');
     
    });

    // quan ly thanh vien
    Route::group(['prefix'=> 'user'],function(){
        Route::get('/','AdminUserController@index')->name('admin.get.list.user');
    });

     // quan ly rating
     Route::group(['prefix'=> 'rating'],function(){
        Route::get('/','AdminRatingController@index')->name('admin.get.list.rating');
    });
});
