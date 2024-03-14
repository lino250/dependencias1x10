<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\IntegranteController;
use \App\Http\Controllers\RepresentanteController;

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('representante', \App\Http\Controllers\RepresentanteController::class);
//Route::resource('integrante/{id}', \App\Http\Controllers\IntegranteController::class);
//Route::get('integrante/{id}', \App\Http\Controllers\IntegranteController::class);
Route::get('integrante/{id}/create', [IntegranteController::class, 'create'])->name('integrante.create');
Route::post('integrante/{id}', [IntegranteController::class, 'store'])->name('integrante.store');
Route::delete('integrante/{id}', [IntegranteController::class, 'destroy'])->name('integrante.destroy');
Route::get('integrante/{id}/show', [IntegranteController::class, 'show'])->name('integrante.show');


Route::post('representante/buscarRepresentante', [RepresentanteController::class, 'buscarRepresentante'])->name('representante.buscar');
Route::get('representante', [RepresentanteController::class, 'index'])->name('representante.index');
Route::get('representante/create', [RepresentanteController::class, 'create'])->name('representante.create');
Route::delete('representante/{id}', [RepresentanteController::class, 'destroy'])->name('representante.destroy');
Route::get('/{id}', [RepresentanteController::class, 'show'])->name('representante.show');
Route::get('representante/{id}/edit', [RepresentanteController::class, 'edit'])->name('representante.edit');
Route::get('representante/{id}', [RepresentanteController::class, 'update'])->name('representante.update');
Route::post('representante', [RepresentanteController::class, 'store'])->name('representante.store');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


/*GET|HEAD        representante ..................................... representante.index › RepresentanteController@index  
POST            representante ..................................... representante.store › RepresentanteController@store  
GET|HEAD        representante/create ............................ representante.create › RepresentanteController@create  
GET|HEAD        representante/{representante} ....................... representante.show › RepresentanteController@show  
PUT|PATCH       representante/{representante} ................... representante.update › RepresentanteController@update  
DELETE          representante/{representante} ................. representante.destroy › RepresentanteController@destroy  
GET|HEAD        representante/{representante}/edit .................. representante.edit › RepresentanteController@edit*/




/*GET|HEAD        integrante/create/{id} ...................................... integrante.create › HomeController@create
GET|HEAD        integrante/{id} ............................................... {id}.index › IntegranteController@index
POST            integrante/{id} ............................................... {id}.store › IntegranteController@store
GET|HEAD        integrante/{id}/create ...................................... {id}.create › IntegranteController@create
GET|HEAD        integrante/{id}/{{id}} .......................................... {id}.show › IntegranteController@show
PUT|PATCH       integrante/{id}/{{id}} ...................................... {id}.update › IntegranteController@update
DELETE          integrante/{id}/{{id}} .................................... {id}.destroy › IntegranteController@destroy
GET|HEAD        integrante/{id}/{{id}}/edit ..................................... {id}.edit › IntegranteController@edit  */

