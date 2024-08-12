<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
{
    session(['locale' => $lang]);
    return response()->json(['current_locale' => App::getLocale()]);
}
}
