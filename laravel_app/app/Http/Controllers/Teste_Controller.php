<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Teste_Controller extends Controller
{
    public function homepage(){
        $our_name = 'Renato'; // supondo que essa variavel seja um valor recebido do banco
        $animals = ['cat', 'dog', 'cow'];
        return view('helloworld', ['all_animals' => $animals,'name' => $our_name, 'catname' => 'pata, venus, marx']);
    }

    public function testepage(){
        return '<h1>TESTE PAGE</h1>';
    }


    // imaginemos que carregamos dados do banco
}
