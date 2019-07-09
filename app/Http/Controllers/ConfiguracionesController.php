<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class ConfiguracionesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    // function __construct()
    // {
    //     $this->middleware(['auth', 'roles:emplMant']); 
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracion = Configuracion::first();

        return view('configuracion.lista', compact('configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.alta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $configuracion = new Configuracion;
        $configuracion->saludo_inicial = $request->input('saludo_inicial');
        
        // Check if a profile image has been uploaded
        if ($request->has('imagen')) {
            // Get image file
            $image = $request->file('imagen');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('saludo_inicial')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/configuraciones/', $filePath);

            $configuracion->fondo_principal = '/imagenes/configuraciones/'.$filePath;
            // dd($categoria->imagen);
        }
        // Persist user record to database
        $configuracion->save();

        return redirect()->route('configuraciones.index');
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
        $configuracion = Configuracion::find($id);
        // dd($categoriasSeleccionadas);
        return view('configuracion.editar', compact('configuracion'));
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
        $configuracion = Configuracion::find($id);
        $configuracion->saludo_inicial = $request->input('saludo_inicial');
        
        // Check if a profile image has been uploaded
        if ($request->has('imagen')) {
            // Get image file
            $image = $request->file('imagen');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/configuraciones/', $filePath);

            // delete old image
            \File::delete(public_path().$configuracion->fondo_principal);

            $configuracion->fondo_principal = '/imagenes/configuraciones/'.$filePath;

        }
        // Persist user record to database
        $configuracion->save();

        return redirect()->route('configuraciones.index');
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
