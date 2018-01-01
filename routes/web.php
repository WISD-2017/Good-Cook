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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');

    Route::get('/post/add', 'Admin\HomeController@postadd')->name('admin.post.add');

    Route::group(['prefix' => 'member'], function()
    {
        Route::get('/list', 'Admin\MemberController@index')->name('admin.member.list');
        Route::get('/add', 'Admin\MemberController@add')->name('admin.member.add');
    });

    Route::group(['prefix' => 'cate'], function()
    {
        Route::get('/list', 'Admin\CateController@index')->name('admin.cate.list');
        Route::get('/add', 'Admin\CateController@add')->name('admin.cate.add');
    });

    Route::group(['prefix' => 'ingredient'], function()
    {
        Route::get('/list', 'Admin\IngerdientController@list')->name('admin.ingredient.list');
        Route::get('/add', 'Admin\IngerdientController@add')->name('admin.ingredient.add');
        Route::post('/store','Admin\IngerdientController@store')->name('admin.ingredient.store');
        Route::get('/edit/{id}', 'Admin\IngerdientController@edit')->name('admin.ingredient.edit');
        Route::post('/update/{id}', 'Admin\IngerdientController@update')->name('admin.ingredient.update');
        Route::get('/delete/{id}', 'Admin\IngerdientController@delete')->name('admin.ingredient.delete');
    });
});




