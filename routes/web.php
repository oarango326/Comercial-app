<?php
use Illuminate\Routing\Router;
//use app\User;
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



Route::get('/', function(){
    return view('home.index');
});

Route::get('creausuario', function(){
	$usertest = new App\User;
	$usertest->name = 'Oscar Arango';
	$usertest->email = 'oscar.arango326@gmail.com';
	$usertest->password = bcrypt('Carol14720**');
	$usertest->save();
	return $usertest;
});


Route::get('configuraciones', ['as'=> 'configuraciones', 'uses' =>'configController@index']);

//Route::post('configuraciones', ['as' => 'config.cargaClienteCSV', 'uses'=>'configController@cargaClienteCSV']);
Route::post('configuraciones', ['as' => 'config.Clientesimport',
								'uses'=>'configController@Clientesimport']);

Route::get('home',['as' => 'home','uses'=> 'navController@index' ]);

Route::get('clientes',['as' => 'clientes.index','uses'=> 'clientesController@index']);

Route::get('cliente/create', ['as' => 'clientes.create','uses'=> 'clientesController@create']);
Route::post('clientes', ['as' => 'clientes.store','uses'=>  'clientesController@store']);
Route::get('cliente/{id}', ['as' => 'clientes.show','uses'=> 'clientesController@show']);
Route::get('cliente/{id}/edit', ['as' => 'clientes.edit','uses'=> 'clientesController@edit']);
Route::put('cliente/{id}', ['as' => 'clientes.update','uses'=> 'clientesController@update']);
Route::delete('cliente/{id}', ['as' => 'clientes.destroy','uses'=> 'clientesController@destroy']);




Route::GET('clienteBusca',['as' => 'clientes.textoBuscar','uses'=> 'clientesController@textoBuscar']);
Route::POST('visitaBusca',['as' => 'visita.clienteBuscar','uses'=> 'visitaController@clienteBuscar']);



Route::resource('visita','visitaController');
Route::resource('articulos','ArticuloController');
Route::resource('categorias', 'CategoriaController');
Route::resource('fabricantes', 'FabricanteController');


Route::get('visitaNueva/{id}', ['as'=>'visita.creavisita', 'uses'=>'visitaController@creavisita']);

Route::get('login',['as' => 'login','uses'=> 'auth\LoginController@showLoginForm']);
Route::post('login','auth\LoginController@login');
Route::get('logout','auth\LoginController@logout');


