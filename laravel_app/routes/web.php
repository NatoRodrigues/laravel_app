<?php

use App\Http\Controllers\Data;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PostController;
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

// user related routes
Route::get('/', [DataController::class, "ShowCorrectHomePage"])->name('login');
Route::post('/process-data',[DataController::class, 'register'])->name('register')->middleware('guest'); // middleware para que apenas 'convidados' (usuarios que n estão logados) sejam redirecionados para a página de registro para realizar registro

Route::post('/login',[DataController::class, 'login'])->middleware('guest'); // se já estiver logado vc n poderá realizar login novamente

Route::post('/logout', [DataController::class, 'logout'])->name('logout')->middleware('mustBeLoggedIn'); // passamos o nome do nosso middleware definido no Kernel.php



// blog post related routes
Route::get('/create-post', [PostController::class, 'ShowCreateForm'])->middleware('mustBeLoggedIn');  // passamos o nome do nosso middleware definido no Kernel.php
Route::post('/create-post', [PostController::class, 'StoreNewPost'])->middleware('mustBeLoggedIn');   // passamos o nome do nosso middleware definido no Kernel.php
Route::get('/single-post/{post}', [PostController::class, 'ShowSinglePost']);
Route::delete('single-post/{post}', [PostController::class, 'delete']);


// profile related routes
Route::get('/profile/{user:username}', [DataController::class, 'profile'])->name('profile');
 

 






//para atribuir uma rota em web.php para um método de algum controller, basta chamar a classe route e o método get passando como parametros a rota que voce deseja, a chamada da classe do controller com o ::class e colocar o nome do método entre aspas duplas.











Route::get('/aboutpage', [exercicio_laravel::class, "aboutpage"]);








































Route::get('/nome_rota', function(){
    return view('welcome');
});