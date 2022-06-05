<?php

namespace App\Http\Controllers;

use App\Models\Materiale;
use Illuminate\Http\Request;

class MaterialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales=Materiale::orderBy("id")->get();
        return view("materiales.index",compact("materiales"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("materiales.create");

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
            'nombre' => 'required',
        ]);
        $datos=$request->all();
		Materiale::create($datos);
		return redirect("/materiales");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materiale  $materiale
     * @return \Illuminate\Http\Response
     */
    public function show(Materiale $materiale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materiale  $materiale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiale=Materiale::find($id);
		return view("materiales.create",compact("materiale"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materiale  $materiale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
        $datos=$request->all();
		Materiale::find($id)->update($datos);
		return redirect("/materiales");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materiale  $materiale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materiales=Materiale::find($id);
        if ($materiales){   //si libro se encontrรณ
			$materiales->delete();
			return "ok";
		}else{
			return "error";
		}
    }
}
