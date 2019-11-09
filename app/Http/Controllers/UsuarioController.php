<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;//modulo agregado de los requests para las validaciones de los campos enviados por los formularios

use Illuminate\Http\File;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('usuario/usuario',compact('usuarios'))->with('pagina','usuario');
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
    public function store(StoreUsuarioRequest $request)
    {
       
        if ($request->hasFile('Foto')) {
            
            $file = $request->file('Foto');//generando ruta de guardado
            $name = time().$file->getClientOriginalName();//generando nombre de usuario
            $file->move(public_path().'/asset/img/userprofile',$name);////'
        }
        //'name', 'email', 'password','tipo', 'estado','foto'
        $usua = new User();
        $usua->name = $request->input('Nombre');
        $usua->email = $request->input('Correo');
        $usua->password = bcrypt($request->input('Contraseña'));
        $usua->estado = 'activo';
        $usua->tipo = $request->input('Tipo');
        $usua->foto = $name;
        $usua->save();
         $usuarios = User::paginate(10);
        return view('usuario/usuario',compact('usuarios'))->with('status','Guardado exitoso...!')->with('pagina','usuario');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        $usuarios = User::paginate(10);
        return view('usuario/usuario',compact('usuarios'))->with('pagina','usuario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        if ($usuario->estado == 'activo') {
            $usuario->estado = 'inactivo';
        }else{
           
            $usuario->estado =  'activo';
           
        } 
        
        $usuario->save();
        $usuarios = User::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('usuario/usuario',compact('usuarios'))->with('pagina','usuario');//llamar a la vista del provee
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsuarioRequest $request, User $usuario)
    { 
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
        $usuario->email = $request->input('Apellido');
        $usuario->password = $request->input('Contraseña');
        $usuario->tipo = $request->input('Tipo');
        
        $usuario->save();
        $usuarios = User::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('usuario/usuario',compact('usuarios'))->with('status','Actualización hecha, Satisfactoriamente...!')->with('pagina','usuario');//llamar a la vista del provee
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        
        if ($usuario->foto != 'user2-160x160.jpg') { 
            $file_path = public_path().'/asset/img/userprofile/'.$usuario->foto;
            \File::delete($file_path); 
        }
        $usuario->delete();
        $usuarios = User::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('usuario/usuario',compact('usuarios'))->with('status','Eliminación hecha, Satisfactoriamente...!')->with('pagina','usuario');//llamar a la vista del provee
        
    }
}
