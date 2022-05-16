<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\estudianteController;

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
    return redirect()->route('estudiante.index');
}); 

/*Route::get('tablas','estudianteController@index');
Route::post('estudiante/importar','estudianteController@importar');*/

Route::resource('/estudiante',estudianteController::class);
