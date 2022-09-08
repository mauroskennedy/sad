<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Models\Urbanizacion;
use App\Models\Representante;

class EstadisticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function byDistrtito($id){
        $representantes = Representante::all();
        $urbanizaciones = Urbanizacion::where('id_distrito',$id)->get();
        $representantesDistrito = Representante::where('id_urbanizacion',$id)->get();


        return $urbanizaciones;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distritos = Distrito::all();
        $urbanizacionesList = array('a');
        foreach ( $distritos as  $distrito) {
            $var = Urbanizacion::where('id_distrito',$distrito->id)->get();
            $count = count($var);
            if(! $count){
                array_push($urbanizacionesList,0);
            }
            else{
                array_push($urbanizacionesList,$count);
            }
        }
        $representantes = Representante::all();
        return view('estadistica.index')->with('representantes',$representantes)->with('distritos',$distritos)
        ->with('urbanizacionesList',$urbanizacionesList);


    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::all();
        return view('estadistica.create')->with('distritos',$distritos);
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
        return redirect('/estadisticas');
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
        return view('estadistica.edit')->with('urbanizacion',$urbanizacion)->with('distritos',$distritos);
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
        return redirect('/estadisticas');
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
        return redirect('/estadisticas');
    }
}
