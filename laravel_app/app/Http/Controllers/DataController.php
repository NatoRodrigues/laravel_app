<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
 
class DataController extends Controller
{

    public function ShowCorrectHomePage(){
        if (auth()->check()) { //  vai checar se o user tá logado. retornará true ou false
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
        
    }
    public function display_data(Request $request)  
    {
    $validatedData = $request->validate([
        'username' => ['required', 'string', 'min:3','max:240', Rule::unique('users', 'username')],
        'email' => ['required', 'email', 'string', 'min:8', 'max:255', Rule::unique('users', 'email')],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'password_confirmation' => 'required|same:password',
    ]);
    
    $validatedData['password'] = bcrypt($validatedData['password']);

    try {
        User::create($validatedData);
         
        return response()->json(['message' => 'Dados inseridos com sucesso']);
        
    } catch (Exception $exception) {
        return response()->json(['error' => $exception->getMessage()], 422);
    }
    
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'loginusername' => ['required'],
            'loginpassword' => ['required'],
        ]);

        if (auth()->attempt(
            ['username' => $validatedData['loginusername'],
            'password' => $validatedData['loginpassword']],
            )) {
                
                $request->session()->regenerate();
                
        }

        else {
            return "ERRO!";
        }
    }
   
}
