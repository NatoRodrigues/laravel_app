<?php

use App\Http\Controllers\Data;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Teste_Controller;
use App\Http\Controllers\exercicio_laravel;
use App\Http\Controllers\LanguageController;

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
    return view('homepage');
});


 

//a gente manda pra cá:

Route::post('/process-data',[DataController::class, 'display_data'])->name('display_data');




// a gente recebe de cá:
Route::post('/condition', function () {
    return view('condition');  
})->name('condition');

//para atribuir uma rota em web.php para um método de algum controller, basta chamar a classe route e o método get passando como parametros a rota que voce deseja, a chamada da classe do controller com o ::class e colocar o nome do método entre aspas duplas.











Route::get('/aboutpage', [exercicio_laravel::class, "aboutpage"]);








































Route::get('/nome_rota', function(){
    return view('welcome');
});