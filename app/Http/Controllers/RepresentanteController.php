<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Distrito;
use App\Models\Representante;
use App\Models\Urbanizacion;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representantes = Representante::all();
        return view('representante.index')->with('representantes',$representantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::all();
        $cargos = Cargo::all();
        return view('representante.create')->with('cargos',$cargos)->with('distritos',$distritos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $representante = new Representante();
        $representante->nombre = $request->get('nombre');
        $representante->carnet = $request->get('carnet');
        $representante->celular = $request->get('celular');
        $representante->id_urbanizacion = $request->get('id_urbanizacion');
        $representante->id_cargo = $request->get('id_cargo');
        $representante->save();
        return redirect('/representantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $representante = Representante::find($id);
        $distritos = Distrito::all();
        $cargos = Cargo::all();
        return view('representante.edit')->with('representante',$representante)->with('cargos',$cargos)->with('distritos',$distritos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $representante = Representante::find($id);
        $representante->nombre = $request->get('nombre');
        $representante->carnet = $request->get('carnet');
        $representante->celular = $request->get('celular');
        $representante->id_urbanizacion = $request->get('id_urbanizacion');
        $representante->id_cargo = $request->get('id_cargo');
        $representante->save();
        return redirect('/representantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $representante = Representante::find($id);
        $representante->delete();
        return redirect('/representantes');
    }
}
