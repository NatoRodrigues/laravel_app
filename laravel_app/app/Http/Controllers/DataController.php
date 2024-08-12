<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function display_data(Request $request)
    {
        $validate_Data = $request->validate([
            'username' =>  'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        if ($validate_Data) {
            User::create($validate_Data);

            return response()->json(['success' => 'Form submitted successfully'.$validate_Data]);
        }

        return response()->json(['error' => 'Form não foi enviado']);
       
    }
    
}