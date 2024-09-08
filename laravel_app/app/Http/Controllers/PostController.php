<?php

namespace App\Http\Controllers;

use ELOQUENT;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
 

use Illuminate\Database\Eloquent\ModelNotFoundExceptionExceptionException;

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

        $newPost = Post::create($validate);

        return redirect("/single-post/{$newPost->user_id}/{$newPost->id}")->with('success', 'você cuittou com sucesso!!!!');
    }

    public function ShowSinglePost(User $user, Post $post){
        
        if ($post) {
            return view('single-post', compact('post'));
        }
        else{
            return 'cu';
        }
    }
}
