<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;//modulo agregado de los requests para las validaciones de los campos enviados por los formularios

use Illuminate\Http\File;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;
class UsuarioController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->tipo == 'Administrador') {
            $usuarios = User::paginate(10);
            return view('usuario/usuario',compact('usuarios'))->with('pagina','usuario');
        }
        else{
            abort(403,"No esta autorizado para realizar esta acción.");// con 401 Unauthorized // 403 es personalizable
        }
        
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
    public function show(User $usuario, Request $request)
    {   //empleando la funcion orWhere de laravel en su ORM
        $usuarios = User::orderBy('id','DESC')->where('name', 'like','%'.$request->input('Buscar').'%')->orWhere('email', 'like','%'.$request->input('Buscar').'%')->paginate(10);//muestra todos los datos de la lista en un list
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
     * @param  \App\User  $usuario
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
        $usuario->email = $request->input('Correo');
        $usuario->password = bcrypt($request->input('Contraseña'));
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
    //___________________________##################################################################################_________________________
    //                  REPORTES
    
    public function reporte()
    {
        $usuarios = User::paginate(10);
        return view('usuario/reporte', compact('usuarios'))->with('pagina','Reporte de usuarios');
    }
    public function pdf() 
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $usuarios = User::all();
        $coment = 'Reporte de usuarios con los datos sin filtrar';
        $pdf = PDF::loadView('pdf.usuario', compact('usuarios','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('usuarios.pdf');//descargar directa "dawnload" en lugar de stream
    }
    public function reporteac() // vista usuarios solo activos
    {
        $usuarios = User::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);
        return view('usuario/reporte', compact('usuarios'))->with('pagina','Reporte de usuarios activos');
    }
    public function pdfac() //vista solo usuarios activos
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $usuarios = User::orderBy('id','DESC')->where('estado', 'activo')->get();
        $coment = 'Reporte de usuarios activos';
        $pdf = PDF::loadView('pdf.usuario', compact('usuarios','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('usuarios.pdf');//descargar directa "dawnload" en lugar de stream
    }
    public function reportein() //Usuarios inactivos
    {
        $usuarios = User::orderBy('id','DESC')->where('estado', 'inactivo')->paginate(10);
        return view('usuario/reporte', compact('usuarios'))->with('pagina','Reporte de usuarios inactivos');
    }
    public function pdfin() //usuarios inactivos
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $usuarios = User::orderBy('id','DESC')->where('estado', 'inactivo')->get();
        $coment = 'Reporte de usuarios activos';
        $pdf = PDF::loadView('pdf.usuario', compact('usuarios','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('usuarios.pdf');//descargar directa "dawnload" en lugar de stream
    }
}
