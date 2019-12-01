<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProveedorRequest;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->tipo == 'Administrador') {
            $proveedores = Proveedor::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
            return view('proveedor/proveedor',compact('proveedores'))->with('pagina','proveedor');//llamar a la vista del proveedor
            
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
    public function store(StoreProveedorRequest $request)
    {//['nombre','estado','celular','direccion']
        $prove = new Proveedor();
        $prove->nombre = $request->input('Nombre');
        $prove->estado = 'activo';
        $prove->celular = $request->input('Telefono');
        $prove->direccion = $request->input('Direccion');
        $prove->save();
        $proveedores = Proveedor::paginate(10);
        return view('proveedor/proveedor',compact('proveedores'))->with('status','Guardado exitoso...!')->with('pagina','proveedor');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request )
    {
        $proveedores = Proveedor::orderBy('id','DESC')->where('nombre', 'like','%'.$request->input('Buscar').'%')->paginate(10);//muestra todos los datos de la lista en un list
        return view('proveedor/proveedor',compact('proveedores'))->with('pagina','proveedor');//llamar a la vista del provee
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        if ($proveedor->estado == 'activo') {
            $proveedor->estado = 'inactivo';
        }else{
           
            $proveedor->estado =  'activo';
           
        } 
        
        $proveedor->save();
        $proveedores = Proveedor::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('proveedor/proveedor',compact('proveedores'))->with('pagina','proveedor');//llamar a la vista del provee
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProveedorRequest $request, Proveedor $proveedor)
    {//['nombre','estado','celular','direccion']
        $proveedor->nombre = $request->input('Nombre');
        $proveedor->celular = $request->input('Telefono');
        $proveedor->direccion = $request->input('Direccion');
        $proveedor->save();
        $proveedores = Proveedor::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('proveedor/proveedor',compact('proveedores'))->with('status','Actualización hecha, Satisfactoriamente...!')->with('pagina','proveedor');//llamar a la vista del provee
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        $proveedores = Proveedor::paginate(10);//Llamar a todos los datos contenidos dentro de la tabla proveedor
        return view('proveedor/proveedor',compact('proveedores'))->with('status','Eliminación hecha, Satisfactoriamente...!')->with('pagina','proveedor');//llamar a la vista del provee
    }
}
