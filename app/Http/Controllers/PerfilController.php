<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;//modulo agregado de los requests para las validaciones de los campos enviados por los formularios
use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\File;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.passwords.reset')->with('pagina','Perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuario.perfil')->with('pagina','Perfil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsuarioRequest $request,$id)
    {   
        $usuario = User::where('id', $id)->first();

       if ($request->hasFile('Foto')) {
            //eliminacion de la foto si ya existente
            if ($usuario->foto != 'user2-160x160.jpg') { 
               $file_path = public_path().'/asset/img/userprofile/'.$usuario->foto;
               \File::delete($file_path);        
          }
           
           //agregando la nueva foto al path
           $file = $request->file('Foto');//generando ruta de guardado
           $name = time().$file->getClientOriginalName();//generando nombre de usuario
           $file->move(public_path().'/asset/img/userprofile',$name);////'
           $usuario->foto = $name;
       }
       //'name', 'email', 'password','tipo', 'estado','foto'
       $usuario->name = $request->input('Nombre');
       $usuario->email = $request->input('Correo');
       //$usuario->password = bcrypt($request->input('Contraseña'));
       $usuario->save();
       return view('usuario.perfil')->with('status','Actualización hecha, Satisfactoriamente...!')->with('pagina','Perfil');//llamar a la vista del provee
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
