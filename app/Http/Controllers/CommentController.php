<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request) {

        //Validacion
        $validte = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        //Recojer datos
        $user = Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        //Assigno valores a mi nuevo objeto
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //Guardar en la base de datos
        $comment->save();

        //Redirecion
        return redirect()->route('image.detail', ['id' =>$image_id])->with(['message' => 'Tu comentario ha sido publicado correctamente!']);
    }

    public function delete($id) {
        //Conseguir datos del usuario identificado
        $user = Auth::user();

        //Conseguir objeto del comentario
        $comment = Comment::find($id);

        //Comprovar si soy el dueño del comentario o de la publicacion
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id )) {
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image->id])
            ->with(['message' => 'Comentario eliminado correctamente!']);

        }else{
            return redirect()->route('image.detail', ['id' => $comment->image->id])
            ->with(['message' => 'El comentario no se ha podido eliminar']);
            
        }
    }
}
