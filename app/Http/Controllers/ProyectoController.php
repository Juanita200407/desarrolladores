<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
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
            $proyectos = Proyecto::where('nombre', 'LIKE', '%' . $query . '%')
                                    ->orderBy('nombre', 'asc')->paginate(5); 
            return view('proyectos.index', compact('proyectos', 'query'));

        }
        // Obtener todos los registros
        $proyectos = Proyecto::orderBy('nombre', 'asc')->paginate(5); 

        // Envíar a la vista
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request;
        $nombre = $request->nombre;
        $duracion = $request->duracion;

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')->with('exito','¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        //Metodo 1: cuando por alguna razon no viene nada por parametro o no tengo todos los datos del formulario
        // $proyecto->nombre = $request->nombre;
        // $proyecto->duracion = $request->duracion;
        // $proyecto->save();
        //Metodo 2
        $proyecto->update($request->all());
        return redirect()->route('proyectos.index')->with('exito','¡El registro se ha actualizado satisfactoriamente!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();
        return redirect()->route('proyectos.index');

        
    }
}
