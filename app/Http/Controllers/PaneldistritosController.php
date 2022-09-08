<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Distrito;
use App\Models\Representante;
use App\Models\Urbanizacion;
use Illuminate\Http\Request;

class PaneldistritosController extends Controller
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
    // public function index()
    // {
    //     $distrito = 1;
    //     $urbanizacionesByDistrito = Urbanizacion::where('id_distrito',$distrito)->get();

    //     return view('panelDistrito.index')->with('urbanizacionesByDistrito',$urbanizacionesByDistrito)->with('distritoId',$distrito);
    // }

    public function byDistrtito($id){
        return Urbanizacion::where('id_distrito',$id)->get();
    }

    public function urbanizacionByDistrito($id)
    {
        $urbanizacionesByDistrito = Urbanizacion::all();

        return view('panelDistrito.show')->with('urbanizacionesByDistrito',$urbanizacionesByDistrito)->with('distritoId',$id);
    }

    public function index()
    {
        //cambio para distrito especifico
        $distritos = Distrito::where('id',1)->get();
        //cambio para distrito especifico
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
        return view('panelDistrito.index')->with('representantes',$representantes)->with('distritos',$distritos)
        ->with('urbanizacionesList',$urbanizacionesList);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
         //cambio para distrito especifico
         $distritos = Distrito::where('id',1)->get();
         $urbanizacion = $request->get("si24");
         //cambio para distrito especifico
        $cargos = Cargo::all();
        return view('panelDistrito.create')->with('cargos',$cargos)->with('distritos',$distritos)
        ->with('urbanizacion',$urbanizacion);

        // return view('mesadirectiva.detallesdistrito');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cargos = Cargo::all();

        foreach ($cargos as $cargo) {
            $representante = new Representante();
            $representante->nombre = $request->get("si$cargo->id");
            $representante->carnet = $request->get("sisi$cargo->id");
            $representante->celular = $request->get("$cargo->id");
            $representante->id_urbanizacion = $request->get('id_urbanizacion');
            $representante->id_cargo = $cargo->id;
            $representante->save();
        }
        return redirect('/panelDistrito
        ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $representantes = Representante::where('id_urbanizacion',$id)->get();
        $distritos = Distrito::all();
        $cargos = Cargo::all();

        $tamaño = sizeof($representantes);

        return view('panelDistrito.edit')->with('urbanizacion',$urbanizacion)->with('cargos',$cargos)
        ->with('distritos',$distritos)->with('representantes',$representantes)->with('tamaño',$tamaño);
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
        $representantes = Representante::where('id_urbanizacion',$id)->get();

        foreach ($representantes as $representante) {
            $representante->nombre = $request->get("si$representante->id_cargo");
            $representante->carnet = $request->get("sisi$representante->id_cargo");
            $representante->celular = $request->get("$representante->id_cargo");
            $representante->save();
        }
        return redirect('/panelDistrito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
