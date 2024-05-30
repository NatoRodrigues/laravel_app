<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teste_Controller;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', [Teste_Controller::class, "homepage"]);





Route::get('/teste', function(){
    return view('teste');
});



Route::get('/condition', [Teste_Controller::class, "condition"]);

//para atribuir uma rota em web.php para um método de algum controller, basta chamar a classe route e o método get passando como parametros a rota que voce deseja, a chamada da classe do controller com o ::class e colocar o nome do método entre aspas duplas.