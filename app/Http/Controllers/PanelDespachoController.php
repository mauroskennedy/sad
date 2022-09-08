<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Distrito;
use App\Models\Representante;
use App\Models\Urbanizacion;
use App\Models\InfraestructuraEducativa;
use App\Models\UnidadEducativa;

class PanelDespachoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function byDistrtito($id){
        return Urbanizacion::where('id_distrito',$id)->get();
    }

    public function urbanizacionByDistrito($id)
    {
        $distrito = Distrito::where('id',$id)->get();
        $urbanizacionesByDistrito = Urbanizacion::where('id_distrito',$id)->get();
        $representantes = Representante::all();

        return view('panelDespacho.show')->with('urbanizacionesByDistrito',$urbanizacionesByDistrito)->with('distritoId',$id)
        ->with('representantes',$representantes)->with('dis',$distrito);
    }

    public function urbanizacionByDistrito2($id)
    {

        $unidadesByDistrito = UnidadEducativa::where('id_distrito',$id)->get();
        $unidades = UnidadEducativa::all();

        return view('panelDespacho.show2')->with('$unidadesByDistrito',$unidadesByDistrito)->with('distritoId',$id)
            ->with('unidades',$unidades);

    }

    public function mesaDirectivaByUrbanizacion($id)
    {
        $distritos = Distrito::all();
        $cargos = Cargo::all();

        $urbanizacion = Urbanizacion::where('id',$id)->get();
        //var_dump($urbanizacion);
        return view('panelDespacho.create')->with('cargos',$cargos)->with('distritos',$distritos)->with('urbanizacion',$urbanizacion);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infraestructura = InfraestructuraEducativa::all();
        $distritos = Distrito::all();
        $representantes = Representante::all();

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

        $infraestructuraList = array('a');
        foreach ( $distritos as  $distrito) {
            $var = InfraestructuraEducativa::where('id_distrito',$distrito->id)->get();
            $count = count($var);
            if(! $count){
                array_push($infraestructuraList,0);
            }
            else{
                array_push($infraestructuraList,$count);
            }
        }



        return view('panelDespacho.index')->with('representantes',$representantes)->with('distritos',$distritos)
        ->with('urbanizacionesList',$urbanizacionesList)->with('infraestructuraList',$infraestructuraList);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $distritos = Distrito::all();
        $cargos = Cargo::all();
        return view('panelDespacho.create')->with('cargos',$cargos)->with('distritos',$distritos);

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
        return redirect('/panelsDespacho');
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

        return view('panelDespacho.edit')->with('urbanizacion',$urbanizacion)->with('cargos',$cargos)
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
        return redirect('/panelsDespacho');

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
