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


Auth::routes();

Route::get('/home', 'HomeController@index');




Auth::routes();

//routes to page for adding books
Route::get('/books/create','BookController@create');

//Route for storing user input into the database
Route::post('/books','BookController@store');

//Route to the page to edit books
Route::get('/books/edit', 'BookController@edit');
// David, shouldn't this be '/books/edit/{Book}', since you are editing a specific book

//Route to update edit into the database
Route::post('/books/update', 'BookController@update');

//Route to show all info about a book, {Book} expects a bid
Route::get('/books/{Book}', 'BookController@show');

//delete selected book, {Book} expects a bid
Route::delete('/books/{Book}','BookController@destroy');




// route for changing password page
Route::get('/changePassword', 'changePassword@index');

//route to update database with new password
Route::post('/changePassword', 'changePassword@update');




// routes for templates
Auth::routes();

//routes to page for creating a Template
Route::get('/templates/create','TemplateController@create');

//Route for storing custom template into the database
Route::post('/templates','TemplateController@store');

//Route to the template page
Route::get('/templates', 'TemplateController@index');

//Route to the page to edit templates
Route::get('/templates/{tname}/edit', 'TemplateController@edit');

//Route to update edit templates into the database
Route::post('/templates/{tname}', 'TemplateController@update');

//Route to delete a selected template, {tname} - name of template expected
Route::delete('/templates/{tname}','TemplateController@destroy');

//Route to show all info about specific book, {tname} - name of template expected
Route::get('/templates/{tname}', 'TemplateController@show');

/*this is pretty cool instead of having to define every single route for get, post, delete patch etc. I defined a resouceful controller that automatically links to the required controller method here is an example of how the routes work: 
anything in the URL that links to bookcollections with a get method will be redirected to bookcollections.index which sends you to the index method of bookcolectionController . To see all the other routes in cmd type php artisan route:list. To test it out in the url bar enter the address http://localhost/bookcat/public/bookcollections that should link to the index page!  , by Andry 3/16/2017*/ 

Route::resource('bookcollections','BookcollectionController');


