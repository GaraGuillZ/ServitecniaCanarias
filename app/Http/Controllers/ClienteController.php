<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listado($clienteId){
        return Cliente::find($clienteId);
    }
     
    public function index()
    {
        $clientes=Cliente::orderBy("id")->get();
        return view("clientes.index",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.create");
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
            'email' => 'required|email|unique:clientes,email,', 
            'telefono'=> 'required|regex:/^\d{9}$/u', 
            'movil'=> 'required|regex:/^\d{9}$/u',
        ]);

        $datos=$request->all();
		Cliente::create($datos);
		return redirect("/clientes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
		return view("clientes.create",compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'telefono'=> 'required|regex:/^\d{9}$/u', 
            'movil'=> 'required|regex:/^\d{9}$/u',
        ]);
        $datos=$request->all();
		Cliente::find($id)->update($datos);
		return redirect("/clientes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes=Cliente::find($id);
        if ($clientes){   //si libro se encontrรณ
			  $clientes->delete();
			  return "ok";
		    }else{
          return "error";
		}
    }
}
