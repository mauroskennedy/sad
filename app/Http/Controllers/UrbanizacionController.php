<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Urbanizacion;
use App\Models\Representante;


use Illuminate\Http\Request;

class UrbanizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function byDistrtito($id){
        $representantes = Representante::all();
        $urbanizaciones = Urbanizacion::where('id_distrito',$id)->get();
        $representantesDistrito = Representante::where('id_urbanizacion',$id)->get();

        // $urbanizaciones = Urbanizacion::where('id_distrito',$id)->get();
        // $representantesDistrito = Representante::where('id_distrito',$id)->get();
        // $vector = [];

        // foreach ($urbanizaciones as $urbanizacion) {
            //$representante = $urbanizacion;
            // $representantesDistrito

            // $representante = Representante::where('id_urbanizacion',$urbanizacion->id)->get();
            // array_push($vector,$urbanizacion);
            // if (!$representante){

            //     array_push($vector,$urbanizacion);
            // };
        // }

        //var_dump($vector);

        return $urbanizaciones;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urbanizaciones = Urbanizacion::all();
        return view('urbanizacion.index')->with('urbanizaciones',$urbanizaciones);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::all();
        return view('urbanizacion.create')->with('distritos',$distritos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $urbanizaciones = new Urbanizacion();
        $urbanizaciones->nombre = $request->get('nombre');
        $urbanizaciones->id_distrito = $request->get('id_distrito');
        $urbanizaciones->save();
        return redirect('/urbanizaciones');
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
        $urbanizacion = Urbanizacion::find($id);
        $distritos = Distrito::all();
        return view('urbanizacion.edit')->with('urbanizacion',$urbanizacion)->with('distritos',$distritos);
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
        $urbanizacion = Urbanizacion::find($id);
        $urbanizacion->nombre = $request->get('nombre');
        $urbanizacion->id_distrito = $request->get('id_distrito');
        $urbanizacion->save();
        return redirect('/urbanizaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $urbanizacion = Urbanizacion::find($id);
        $urbanizacion->delete();
        return redirect('/urbanizaciones');
    }
}
