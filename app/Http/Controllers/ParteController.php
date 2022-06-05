<?php

namespace App\Http\Controllers;

use App\Models\Parte;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Materiale;
use PDF;


use Illuminate\Support\Facades\Storage;

class ParteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partes=Parte::orderBy("id")->get();
        return view("partes.index",compact("partes"));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $materiales = Materiale::all();
        return view("partes.create", compact('clientes', 'empleados', 'materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'n_parte' => 'required|unique:partes,n_parte',
            'descripcion' => 'required',
            'trabajos_realizados' => 'required',
            'f_inicio' => 'required',
            'mano_de_obra' => 'required',
            'imagen' => 'required|image|max:2048', 
            'albaran' => 'required|image|max:2048'
        ]);

        $imagen = $request->file('imagen')->store('public/imagenes');
        $url = Storage::url($imagen);
        $albaran = $request->file('albaran')->store('public/imagenes');
        $url2 = Storage::url($albaran);

        $parte = new Parte;
        $parte->n_parte = $request->n_parte; 
        $parte->descripcion = $request->descripcion;
        $parte->f_inicio = $request->f_inicio;
        $parte->trabajos_realizados = $request->trabajos_realizados;
        $parte->observaciones = $request->observaciones;
        $parte->mano_de_obra = $request->mano_de_obra;
        $parte->empleado_id = $request->empleado_id;
        $parte->cliente_id = $request->cliente_id;
        $parte->imagen = $url;
        $parte->albaran = $url2;
        $parte->save(); 
		return redirect("/partes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function show(Parte $parte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $materiales = Materiale::all();
        $parte=Parte::find($id);
        return view("partes.create", compact('parte', 'clientes', 'empleados', 'materiales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'n_parte' => 'required|unique:partes,n_parte',
            'descripcion' => 'required',
            'trabajos_realizados' => 'required',
            'f_inicio' => 'required',
            'mano_de_obra' => 'required',
            'imagen' => 'image|max:2048', 
            'albaran' => 'image|max:2048'
        ]);

        $imagen = $request->file('imagen')->store('public/imagenes');
        $url = Storage::url($imagen);
        $albaran = $request->file('albaran')->store('public/imagenes');
        $url2 = Storage::url($albaran);

        $parte = new Parte;
        $parte->n_parte = $request->n_parte; 
        $parte->descripcion = $request->descripcion;
        $parte->f_inicio = $request->f_inicio;
        $parte->trabajos_realizados = $request->trabajos_realizados;
        $parte->observaciones = $request->observaciones;
        $parte->mano_de_obra = $request->mano_de_obra;
        $parte->empleado_id = $request->empleado_id;
        $parte->cliente_id = $request->cliente_id;
        $parte->imagen = $url;
        $parte->albaran = $url2;

        $parte->save(); 
		return redirect("/partes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partes=Parte::find($id);
        if ($partes){   //si libro se encontrรณ
			$partes->delete();
			return "ok";
		}else{
			return "error";
		}
    }
    public function listadoPdf(){
        $partes=Parte::orderBy("n_parte")->limit(20)->get();
        $pdf = PDF::loadView('partes.pdf',compact("partes"));
        return $pdf->download('listado_partes.pdf');

    }
}
