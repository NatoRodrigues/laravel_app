<?php

namespace App\Http\Controllers;

use ELOQUENT;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
 

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionExceptionException;

class PostController extends Controller
{
    
    public function delete(Post $post){
        
        if(!auth()->user()->cannot('delete', $post)){
            return redirect()->back()->with('failure', "CALMA CALABREZU");
        }
        $post->delete();

        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post Successfully deleted');
    }



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

        return redirect("/single-post/{$newPost->id}")->with('success', 'você cuittou com sucesso!!!!');
    }



    public function ShowSinglePost(User $user, Post $post)
    { 
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><td><strong><b><br>'); // transforma o texto do cuitt em formato markdown e vai permitir apenas as seguintes tags: '<p><ul><td><strong><b><br>'
        
        return view('single-post', compact('post'));
    }

    
}
