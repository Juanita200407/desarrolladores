<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = $request->buscar;
            $desarrolladores = Desarrollador::where('nombre', 'LIKE', '%' . $query . '%')
                                    ->orderBy('nombre', 'asc')->paginate(5); 
            return view('desarrolladores.index', compact('desarrolladores', 'query'));

        }
        // Obtener todos los registros
        $desarrolladores = Desarrollador::orderBy('nombre', 'asc')->paginate(5);

        // Envíar a la vista
        return view('desarrolladores.index', compact('desarrolladores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
        return view('desarrolladores.insert', compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nombre = $request->nombre;
        // $apellido = $request->apellido;
        // $telefono = $request->telefono;
        // $direccion = $request->direccion;
        // $proyecto_id = $request->proyecto_id;
        Desarrollador::create($request->all());
        return redirect()->route('desarrolladores.index')->with('exito','¡El registro se ha creado satisfactoriamente!');
        
        // echo $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desarrollador  $Desarrollador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desarrolladores = Desarrollador::join('proyectos', 'desarrolladors.proyecto_id', 'proyectos.id')
                                            ->select('desarrolladors.id', 'desarrolladors.nombre', 'desarrolladors.apellido', 'desarrolladors.telefono','desarrolladors.direccion', 'proyectos.nombre as proyecto')
                                            ->where('desarrolladors.id', $id)
                                            ->first();
        return view('desarrolladores.show', compact('desarrolladores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desarrollador  $Desarrollador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desarrolladores = Desarrollador::findOrFail($id);
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
        return view('desarrolladores.edit', compact('desarrolladores', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desarrollador  $desarrolladores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $desarrolladores = Desarrollador::findOrFail($id);
        //Metodo 1: cuando por alguna razon no viene nada por parametro o no tengo todos los datos del formulario
        // $desarrolladores->nombre = $request->nombre;
        // $desarrolladores->$apellido = $request->apellido;
        // $desarrolladores->$telefono = $request->telefono;
        // $desarrolladores->$direccion = $request->direccion;
        // $desarrolladores->$proyecto_id = $request->proyecto_id;
        // $desarrolladores->save();
        //Metodo 2
        $desarrolladores->update($request->all());
        return redirect()->route('desarrolladores.index')->with('exito','¡El registro se ha actualizado satisfactoriamente!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desarrollador  $Desarrollador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desarrolladores = desarrollador::findOrFail($id);
        $desarrolladores->delete();
        return redirect()->route('desarrolladores.index');

        
    }
}
