<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Distrito;
use App\Models\Urbanizacion;

class UrbanizacionPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function byDistrtito($id){
        return Urbanizacion::where('id_distrito',$id)->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //cambio para distritos
        $urbanizaciones = Urbanizacion::where('id_distrito',1)->get();
    //cambio para distritos
        return view('urbanizacionPanel.index')->with('urbanizaciones',$urbanizaciones);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::all();
        return view('urbanizacionPanel.create')->with('distritos',$distritos);
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
        //Cambio por distrito
        $urbanizaciones->id_distrito = 1;
        $urbanizaciones->save();
        return redirect('/urbanizacionesPanel');
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
        return view('urbanizacionPanel.edit')->with('urbanizacion',$urbanizacion)->with('distritos',$distritos);
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
        return redirect('/urbanizacionesPanel');
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
        return redirect('/urbanizacionesPanel');
    }
}
