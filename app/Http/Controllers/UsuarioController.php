<?php

namespace App\Http\Controllers;


use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;//modulo agregado de los requests para las validaciones de los campos enviados por los formularios

use Illuminate\Http\File;
use Response;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(10);
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
        //'nombre','apellido','contraseña','estado','tipo'
        $usua = new Usuario();
        $usua->nombre = $request->input('Nombre');
        $usua->apellido = $request->input('Apellido');
        $usua->contraseña = $request->input('Contraseña');
        $usua->estado = 'activo';
        $usua->tipo = $request->input('Tipo');
        $usua->foto = $name;
        $usua->save();
         $usuarios = Usuario::paginate(10);
        return view('usuario/usuario',compact('usuarios'))->with('status','Guardado exitoso...!')->with('pagina','usuario');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        $usuarios = Usuario::paginate(10);
        return view('usuario/usuario',compact('usuarios'))->with('pagina','usuario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        if ($usuario->estado == 'activo') {
            $usuario->estado = 'inactivo';
        }else{
           
            $usuario->estado =  'activo';
           
        } 
        
        $usuario->save();
        $usuarios = Usuario::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('usuario/usuario',compact('usuarios'))->with('pagina','usuario');//llamar a la vista del provee
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsuarioRequest $request, Usuario $usuario)
    { 
        if ($request->hasFile('Foto')) {
            //eliminacion de la foto ya existente
            $file_path = public_path().'/asset/img/userprofile/'.$usuario->foto;
            \File::delete($file_path);
            //agregando la nueva foto al path
            $file = $request->file('Foto');//generando ruta de guardado
            $name = time().$file->getClientOriginalName();//generando nombre de usuario
            $file->move(public_path().'/asset/img/userprofile',$name);////'
            $usuario->foto = $name;
        }
        //'nombre','apellido','contraseña','estado','tipo'
        $usuario->nombre = $request->input('Nombre');
        $usuario->apellido = $request->input('Apellido');
        $usuario->contraseña = $request->input('Contraseña');
        $usuario->tipo = $request->input('Tipo');
        
        $usuario->save();
        $usuarios = Usuario::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('usuario/usuario',compact('usuarios'))->with('status','Actualización hecha, Satisfactoriamente...!')->with('pagina','usuario');//llamar a la vista del provee
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $file_path = public_path().'/asset/img/userprofile/'.$usuario->foto;
        \File::delete($file_path);
        $usuario->delete();
        $usuarios = Usuario::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('usuario/usuario',compact('usuarios'))->with('status','Eliminación hecha, Satisfactoriamente...!')->with('pagina','usuario');//llamar a la vista del provee
        
    }
}
