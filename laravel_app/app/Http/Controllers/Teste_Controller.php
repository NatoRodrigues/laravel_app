<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

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

    public function single_post(){
        return view('single-post');
    }

    public function condition(){
        $header = 'this is a header';
        $counter = 4;
        if ($counter > 3) {
            return view('condition', ['header' => $header]);
        }

        else {
            throw new \Exception("O contador é menor ou igual a 3.");
            
        }
    }

    // imaginemos que carregamos dados do banco
}
