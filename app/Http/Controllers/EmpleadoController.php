<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=Empleado::orderBy("id")->get();
        return view("empleados.index",compact("empleados"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("empleados.create");

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
            'nombre' => 'regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:empleados,email,', 
            'dni'=> 'required|regex:/^\d{8}[a-zA-Z]$/u',
        ]);
        $datos=$request->all();
		Empleado::create($datos);
		return redirect("/empleados");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::find($id);
		return view("empleados.create",compact("empleado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'regex:/^[\pL\s\-]+$/u',
            'dni'=> 'required|regex:/^\d{8}[a-zA-Z]$/u',
        ]);
        $datos=$request->all();
		Empleado::find($id)->update($datos);
		return redirect("/empleados");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleados=Empleado::find($id);
        if ($empleados){   //si libro se encontrรณ
			  $empleados->delete();
			  return "ok";
		    }else{
          return "error";
		}
    }
}
