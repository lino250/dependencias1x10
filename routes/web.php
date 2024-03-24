<?php
use App\Http\Middleware\CargarUsuarioYDependencia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\landingController;
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
use \App\Http\Controllers\ReporteController;
Auth::routes();
Route::get('/', landingController::class);



//Route::middleware('auth')->group(function () {


Route::middleware(['auth', CargarUsuarioYDependencia::class])->group(function () {
    // Link Para el panel
    Route::get('dashboard',DashboardController::class,'index');
    
    // Links para las rutas de Representante
    Route::get('representante', [RepresentanteController::class, 'index'])->name('representante.index');
    Route::post('representante/buscarRepresentante', [RepresentanteController::class, 'buscarRepresentante'])->name('representante.buscar');
    Route::get('representante/create', [RepresentanteController::class, 'create'])->name('representante.create');
    Route::delete('representante/{id}', [RepresentanteController::class, 'destroy'])->name('representante.destroy');
    Route::get('representante/{id}/show', [RepresentanteController::class, 'show'])->name('representante.show');
    Route::get('representante/{id}/edit', [RepresentanteController::class, 'edit'])->name('representante.edit');
    Route::get('representante/{id}', [RepresentanteController::class, 'update'])->name('representante.update');
    Route::post('representante', [RepresentanteController::class, 'store'])->name('representante.store');
    Route::get('/representante/{parroquiaId}/centros', [RepresentanteController::class, 'obtenerCentros'])->name('buscarCentros');

    //Links para las rutas de integrantes
    Route::get('integrante', [IntegranteController::class, 'index'])->name('integrante.index');
    Route::get('integrante/{id}/create', [IntegranteController::class, 'create'])->name('integrante.create');
    Route::post('integrante/{id}', [IntegranteController::class, 'store'])->name('integrante.store');
    Route::delete('integrante/{id}', [IntegranteController::class, 'destroy'])->name('integrante.destroy');
    Route::get('integrante/{id}/show', [IntegranteController::class, 'show'])->name('integrante.show');
    Route::get('integrante/{id}/edit', [IntegranteController::class, 'edit'])->name('integrante.edit');
    Route::get('integrante/{id}', [IntegranteController::class, 'update'])->name('integrante.update');

//Links para reportes
    Route::get('reporte', [ReporteController::class, 'index'])->name('reporte.index');
    Route::post('reporte', [ReporteController::class, 'filtrarDependencias'])->name('reporte.buscar');



});

/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::resource('representante', \App\Http\Controllers\RepresentanteController::class);
//Route::resource('integrante/{id}', \App\Http\Controllers\IntegranteController::class);
//Route::get('integrante/{id}', \App\Http\Controllers\IntegranteController::class);







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

