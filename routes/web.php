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

Route::get('/', 'HomeController@accueil');

Auth::routes();

Route::get('/home', 'HomeController@index');
// La faq
Route::get('/home/faq/', 'FaqController@index')->name('faqIndex');
Route::get('/home/faq/add', 'FaqController@create')->name('faqAdd');
Route::get('/home/faq/edit/{id}', 'FaqController@edit')->name('editAdd');
Route::get('/home/faq/delete/{id}', 'FaqController@delete')->name('deleteAdd');
Route::post('/home/faq/create', array('uses'=>'FaqController@store'));
Route::post('/home/faq/update', array('uses'=>'FaqController@update'));

// FAQ Rest
Route::resource('/faq', 'FaqsController');

// Les restaurants
Route::get('/home/restaurant/', 'RestaurantController@index')->name('restaurantIndex');
Route::get('/home/restaurant/add', 'RestaurantController@create')->name('restaurantAdd');
Route::get('/home/restaurant/edit/{id}', 'RestaurantController@edit')->name('editAdd');
Route::get('/home/restaurant/delete/{id}', 'RestaurantController@delete')->name('deleteAdd');
Route::post('/home/restaurant/create', array('uses'=>'RestaurantController@store'));
Route::post('/home/restaurant/update', array('uses'=>'RestaurantController@update'));

// Restaurants Rest
Route::resource('/fournisseurs', 'RestaurantsController');

// Les menu
Route::get('/home/menu/', 'MenuController@index')->name('menuIndex');
Route::get('/home/menu/add', 'MenuController@create')->name('menuAdd');
Route::get('/home/menu/edit/{id}', 'MenuController@edit')->name('editAdd');
Route::get('/home/menu/delete/{id}', 'MenuController@delete')->name('deleteAdd');
Route::post('/home/menu/create', array('uses'=>'MenuController@store'));
Route::post('/home/menu/update', array('uses'=>'MenuController@update'));

// Menus Rest
Route::resource('/offres', 'OffresController');

// Les utilisateurs
Route::get('/home/utilisateurs/', 'UtilisateurController@index')->name('userIndex');
Route::get('/home/utilisateurs/edit/{id}', 'UtilisateurController@edit')->name('userEdit');
Route::get('/home/utilisateurs/delete/{id}', 'UtilisateurController@delete')->name('userDelete');
Route::post('/home/utilisateurs/update', array('uses'=>'UtilisateurController@update'));

// Menus Rest
Route::resource('/utilisateurs', 'UtilisateursController');

// REST
Route::get('/rest', 'RestController@index');

// Commandes Rest
Route::resource('/commandes', 'CommandesController');
Route::resource('/home/commandes', 'CommandeController');

Route::resource('/home/messages', 'MessagesController');
