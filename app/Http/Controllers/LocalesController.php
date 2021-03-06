<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\SubCategoria;
use App\Categoria;

use App\Imports\LocalImport;
use App\Imports\PivotImport;
use Maatwebsite\Excel\Facades\Excel;

class LocalesController extends Controller
{
    function __construct()
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
        $locales = Local::all();
        // dd($locales);
        return view('local.lista', compact('locales'));
        // return view('local.pruebaTabla', compact('locales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::where('estado',1)->orderBy('nombre')->get();
        // return view('local.Newalta', compact('subcategorias'));
        return view('local.alta2', compact('subcategorias','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $local = new Local;
        $local->nombre = $request->input('nombre');
        $local->ubicacion = $request->input('ubicacion');
        $local->estado = $request->has('estado')? 1:0;
        // dd($request->all());
        
        // Check if a profile image has been uploaded
        if ($request->has('foto_principal')) {
            // Get image file
            $image = $request->file('foto_principal');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            // return $name;
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/locales/foto_principal/', $filePath);

            $local->foto_principal = '/imagenes/locales/foto_principal/'.$filePath;
            // dd($categoria->imagen);
        }
        // Check if a profile image has been uploaded
        if ($request->has('foto_ubicacion')) {
            // Get image file
            $image = $request->file('foto_ubicacion');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/locales/foto_ubicacion/', $filePath);

            $local->foto_ubicacion = '/imagenes/locales/foto_ubicacion/'.$filePath;
            // dd($categoria->imagen);
        }

        // Persist user record to database
        $local->save();

        //y gaurdamos la relacion
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        // $local->products()->saveMany($products);
        // $local->products()->saveMany($products);
        // return $request->categorias;
        foreach ($request->categorias as $categoria) {
            foreach ($request->subcategorias as $subcategoria) {
                $local->categorias()->attach($categoria, ['subcategoria_id' => $subcategoria]);
            }
        }
        // $local->categorias()->attach($request->categorias);
        // $local->subCategorias()->attach($request->subcategorias);

        return redirect()->route('locales.index');
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
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::where('estado',1)->orderBy('nombre')->get();
        $local = Local::find($id);
        // dd($local->subCategorias);
        return view('local.editar', compact('local','subcategorias','categorias'));
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
        // dd($request->all());
        $local = Local::find($id);
        $local->nombre = $request->input('nombre');
        $local->ubicacion = $request->input('ubicacion');
        $local->estado = $request->has('estado')? 1:0;
        // dd($request->all());
        
        // Check if a profile image has been uploaded
        if ($request->has('foto_principal')) {
            // Get image file
            $image = $request->file('foto_principal');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            // return $name;
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/locales/foto_principal/', $filePath);

            $local->foto_principal = '/imagenes/locales/foto_principal/'.$filePath;
            // dd($categoria->imagen);
        }
        // Check if a profile image has been uploaded
        if ($request->has('foto_ubicacion')) {
            // Get image file
            $image = $request->file('foto_ubicacion');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/locales/foto_ubicacion/', $filePath);

            $local->foto_ubicacion = '/imagenes/locales/foto_ubicacion/'.$filePath;
            // dd($categoria->imagen);
        }

        // Persist user record to database
        $local->save();

        //y gaurdamos la relacion
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        $local->categorias()->wherePivot('local_id','=',$id)->detach();
        foreach ($request->categorias as $categoria) {
            foreach ($request->subcategorias as $subcategoria) {
                $local->categorias()->attach($categoria, ['subcategoria_id' => $subcategoria]);
            }
        }
        // $local->subCategorias()->sync($request->subcategorias);

        return redirect()->route('locales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $local = Local::find($id);
        $local->subCategorias()->detach();
        $local->categorias()->detach();

        Local::destroy($id);

        return redirect()->route('locales.index');
    }

    public function import() 
    {
        Excel::import(new LocalImport, 'local.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function importPivot() 
    {
        Excel::import(new PivotImport, 'pivot.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
