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


Auth::routes(['register' => false,'login' => false]);

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');


    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/Candidatelogin', 'CandidateLogin@show')->name('login.show.candidate');
    Route::post('/Cadidatelogin', 'CandidateLogin@login')->name('login.perform.candidate');

    Route::get('/image', 'PostsController@imageindex')->name('image.index');
    Route::post('/image', 'PostsController@image')->name('image.store');
    
    Route::group(['middleware' => ['guest']], function() {
        /**->middleware('throttle:1,120')
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
      
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });
    Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**->middleware(['throttle:4,1'])
         * User Routes
         */
        Route::group(['prefix' => 'posts'], function() {
            Route::get('/{id}', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create/', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{id}/update', 'PostsController@update')->name('posts.update');
            // Route::patch('/{id}/finished', 'PostsController@finished')->name('posts.finish');

            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
            Route::patch('/{id}/finish', 'PostsController@finish')->name('posts.finish');
           
           
            
        });
        Route::get('/examscores', 'PostsController@examscores')->name('examscores');
        
       
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});
});