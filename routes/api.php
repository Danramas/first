<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'AuthController@logout');
});

Route::get('albums', 'AlbumController@index');

Route::get('photos/{album}', 'AlbumController@idPhoto');

Route::get('image/{photo}', 'PhotoController@show');

Route::post('/upload','UploadController@store');

Route::post('/CreateAlbum', 'AlbumController@store');
