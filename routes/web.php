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

Route::get('/', 'pagesController@home')->name('home.page');

Route::get('/{main}', 'pagesController@mainpage')->name('main.page');
Route::get('/{parent}/{url}', 'pagesController@childpage')->name('child.page');

Route::get('properties/type/{category}', 'propertyController@list')->name('properties.list');
Route::get('property/{url}/details', 'propertyController@details')->name('properties.details');
Route::post('property/view/inquiry', 'pagesController@view_inquiry')->name('properties.view.inquiry');

Route::get('blog/{url}/details', 'pagesController@blog_details')->name('blog.details');

Route::post('newsletter/subscription/save', 'pagesController@subscription')->name('newsletter.save');
Route::post('inquiry/form/save', 'pagesController@inquiry')->name('inquiry.save');

