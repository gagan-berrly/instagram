<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Comment;
use App\Like;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    //con esto restringimos el acceso a solo ususarios identificados, es decir, solo podra ver este si el usuario esta identificado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('image.create');
    }

    public function savePost(Request $request) {

        //Validacion
        $validate = $this->validate($request,[
            'description' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg,gif,svg' //mimes->formatos
        ]);

        
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        
        
        //Assignar valores nuevo objeto
        $user = Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        //Subir fichero
        if($image_path) {
            $image_path_name = time().$image_path->getClientOriginalName();
            
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        //Guarda en la base de datos :D
        $image->save();

        return redirect()->route('home')
        ->with(['message' => 'Tu publicación se ha subido!']);
        
    }

    public function getImage($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id) {
        $image = Image::find($id);
        return view('image.detail', [
            'image' => $image
        ]);
    }

    public function delete($id) {
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id',$id)->get();
        $likes = Like::where('image_id',$id)->get();

        if($user && $image && $image->user->id == $user->id){

            //Eliminar comentarios
            if($comments && count($comments) >= 1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }

            //Eliminar likes
            if($likes && count($likes) >= 1){
                foreach($likes as $like){
                    $like->delete();
                }
            }

            //Eliminar ficheros de imagen guardados en el storage
            Storage::disk('images')->delete($image->image_path);

            //Eliminar registro de la imagen
            $image->delete();
            $message = array('message' => 'El post se ha borrado correctamente');

        }else{
            $message = array('message' => 'Ha ocurrido un error al borrar el post, vuelva a intentar');
        }

        return redirect()->route('home')->with($message);
    }

    public function edit($id){
        $user = Auth::user();
        $image = Image::find($id);

        if($user && $image && $image->user->id == $user->id){
            return view('image.edit', [
                'image' => $image
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request) {

        $validate = $this->validate($request,[
            'description' => 'required|string',
            'image_id' => 'required|integer'
        ]);

        $image_id = $request->input('image_id');
        $description = $request->input('description');

        //Buscar objeto en la bases de datos
        $image = Image::find($image_id);
        $image->description = $description;

        //Actulizar registro
        $image->update();

        return redirect()->route('image.detail', ['id' => $image_id])->with([
            'message' => 'Has actualizado la descripción de tu post'
        ]);

        
    }
}