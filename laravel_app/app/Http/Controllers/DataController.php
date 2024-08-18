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
   
}
