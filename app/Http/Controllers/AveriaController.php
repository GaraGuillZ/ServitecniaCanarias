<?php

namespace App\Http\Controllers;

use App\Models\Averia;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;


class AveriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $averias=Averia::orderBy("id")->get();
        return view("averias.index",compact("averias"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        return view("averias.create", compact('clientes', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $datos=$request->all();
		// Averia::create($datos);
		// return redirect("/averias");

        $request->validate([
            'descripcion' => 'required',
            'f_alta' => 'required',
            'cliente_id' => 'required',
            'observaciones' => 'required',
        ]);

        $averia = new Averia;
        $averia->descripcion = $request->descripcion;
        $averia->f_alta = $request->f_alta;
        $averia->f_realizacion = $request->f_realizacion;
        $averia->observaciones = $request->observaciones;
        $averia->empleado_id = $request->empleado_id;
        $averia->cliente_id = $request->cliente_id;
        $averia->estado = $request->estado;
        $averia->facturado = $request->facturado;
        $averia->save(); 
		return redirect("/averias");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Averia  $averia
     * @return \Illuminate\Http\Response
     */
    public function show(Averia $averia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Averia  $averia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $averia=Averia::find($id);
        return view("averias.create", compact('averia', 'clientes', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Averia  $averia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
            'f_alta' => 'required',
            'cliente_id' => 'required',
            'observaciones' => 'required',

        ]);

        
        $averia = Averia::find($id);
        $averia->descripcion = $request->descripcion;
        $averia->f_alta = $request->f_alta;
        $averia->f_realizacion = $request->f_realizacion;
        $averia->observaciones = $request->observaciones;
        $averia->empleado_id = $request->empleado_id;
        $averia->cliente_id = $request->cliente_id;
        $averia->estado = $request->estado;
        $averia->facturado = $request->facturado;
        $averia->save(); 
		return redirect("/averias");

        // $datos=$request->all();
		// Averia::find($id)->update($datos);
		// return redirect("/averias");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Averia  $averia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $averias=Averia::find($id);
        if ($averias){   //si libro se encontrรณ
			  $averias->delete();
			  return "ok";
		    }else{
          return "error";
		}
    }
}
