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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/mainpage', function () {
    return view('layouts.mainpage');
});
Route::get('/Country', function () {
    return view('Country.index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/Country","CountryController@index")->name('country');

Route::get("/Country/create","CountryController@create")->name('create-Country');

Route::post("/Country/create","CountryController@postCreate")->name('post-Country');
Route::get("/Country/delete/{id}","CountryController@delete")->name('delete-country');

//edit view
Route::get("/Country/edit/{id}","CountryController@edit")->name('edit-country');
//update data
Route::post("/Country/edit/{id}","CountryController@postEdit")->name('post-edit-country');


//city route
Route::resource("City", "CityController");
Route::get("/city/{id}/delete","CityController@destroy")->name('delete-city');

//News route
Route::get("/News/search-page-advanced","NewsController@SearchPagingAdvanced")->name('search-page-advanced');
Route::get("/News/search-paging","NewsController@searchPaging")->name('Category-search-paging');
Route::resource("News", "NewsController");
Route::get("/News/{id}/delete","NewsController@destroy")->name('delete-News');


//Category route
Route::get("/Category/search-paging","CategoryController@searchPaging")->name('Category-search-paging');
Route::resource("Category", "CategoryController");
Route::get("/Category/{id}/delete","CategoryController@destroy")->name('delete-Category');

