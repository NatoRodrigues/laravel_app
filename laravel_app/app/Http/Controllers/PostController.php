<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showCreateForm(){
        return view("create-post");
    }

    public function StoreNewPost(Request $request){
        $validate = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $validate['title'] = strip_tags($validate['title']);
        $validate['body'] = strip_tags($validate['body']);
        $validate['user_id'] = auth()->id(); // especificar o usuario do post através do id chamando o método 'auth' para pegar a sessão atual. auth vai buscar a sessão atual

        Post::create($validate);
    }
}
