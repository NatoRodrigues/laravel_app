<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function display_data(Request $request)  
    {
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|min:6',
        'password_confirmation' => 'required|same:password',
    ]);

    if ($validatedData) {
        return response()->json(['message' => 'Dados inseridos com sucesso!', 'username' => $validatedData['username']]);

    }
    
    }
   
}
