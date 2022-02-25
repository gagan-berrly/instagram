<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ($search = null){

        if(!empty($search)){
            $users = User::where('nick', 'LIKE', '%'. $search .'%')
            ->orWhere('name','LIKE', '%'. $search .'%')
            ->orWhere('surname','LIKE', '%'. $search .'%')
            ->orderBy('id','desc')
            ->get();

            /*
            if(count($users) == 0){
                
            }
            */

        }else{
            $users = User::orderBy('id','desc')->get();
        }

        return view('user.index', ['users' => $users]);
    }

    public function config() {
        return view ('user.config');
    }

    public function update(Request $request) {

        //Conseguir usuario identificado
        $user = \Auth::user();

        $id = $user->id;
        
        //Validación del formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id, //que sea un campo unico pero puede haber una excepcion, que el nick coincida con el nick que tengo con el id actual 
            'quote' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id //con esto logramos que el id coincida con el usuario que esta idenfiticado
        ]);

        //Recojer los datos del formulario
        $name    = $request->input('name');
        $surname = $request->input('surname');
        $nick    = $request->input('nick');
        $quote   = $request->input('quote');
        $email   = $request->input('email');

        //Assignar nuevos valores al objeto del usuario
        $user->name    = $name;
        $user->surname = $surname;
        $user->nick    = $nick;
        $user->quote   = $quote;
        $user->email   = $email;

        //Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path) {
            //Poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //Guardar en la carpeta storage (storage/app/user)
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            //Seteo(le doy un nombre) el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }

        //Ejecutar consulta y canvios en la base de datos
        $user->update();
        return redirect()->route('config')
                        ->with(['message' => 'Los datos del usuario se han actualizado correctamente']);
        
    }

    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function userProfile($id) {

        $user = User::find($id);

        return view('user.profile',['user' => $user]);
    }

}
