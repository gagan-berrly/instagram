<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id) {
        
        //Recojer datos del usuario y la imagen
        $user = Auth::user();

        //Condicion para ver si existe el like
        $isset_like = Like::where('user_id', $user->id)->where('image_id', $image_id)->count();

        if($isset_like == 0) {

            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;
    
            //Guardar
            $like->save();

            return response()->json([
                'like' => $like,
            ]);
    
        }else{
            
            return response()->json([
                'message' => 'Ya has dado like a esta imagen',
            ]);

        }


    }

    public function dislike($image_id) {
    
        
        //Recojer datos del usuario y la imagen
        $user = Auth::user();

        //Condicion para ver si existe el like
        $like = Like::where('user_id', $user->id)->where('image_id', $image_id)->first();

        if($like) {

            //Eliminar like
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike'
            ]);
    
        }else{
            
            return response()->json([
                'message' => 'No puedes dar dislike sin antes dar like',
            ]);

        }
    }

    public function authUserLikes() {
        $user = Auth::user();
        $likes = Like::where('user_id',$user->id)
        ->orderby('id', 'desc')
        ->get();
        return view('like.index', ['likes'=>$likes]);
    }


}
