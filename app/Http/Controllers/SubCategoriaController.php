<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategoria;
use App\Categoria;
use App\Local;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

use App\Imports\SubcategoriaImport;
use Maatwebsite\Excel\Facades\Excel;

class SubCategoriaController extends Controller
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
        $subcategorias = SubCategoria::all();

        return view('subcategoria.lista', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategoria.alta', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->input('estado');
        $subcategoria = new SubCategoria;
        $subcategoria->nombre = $request->input('nombre');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->estado = $request->has('estado')? 1:0;
        
        // Check if a profile image has been uploaded
        if ($request->has('imagen')) {
            // Get image file
            $image = $request->file('imagen');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/subcategorias/', $filePath);

            $subcategoria->imagen = '/imagenes/subcategorias/'.$filePath;
            // dd($categoria->imagen);
        }
        // Persist user record to database
        $subcategoria->save();

        //y gaurdamos la relacion
        // $subcategoria->categorias()->attach($request->categorias);


        return redirect()->route('subcategorias.index');
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
        $categorias = Categoria::where('estado',0)->get();
        $subcategoria = SubCategoria::find($id);
        // dd($subcategoria);
        // dd($categorias);
        return view('subcategoria.editar', compact('subcategoria', 'categorias'));
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
        $subcategoria = SubCategoria::find($id);
        $subcategoria->nombre = $request->input('nombre');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->estado = $request->has('estado')? 1:0;
        
        // return $request;
        
        // Check if a profile image has been uploaded
        if ($request->has('imagen')) {
            // Get image file
            $image = $request->file('imagen');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/subcategorias/', $filePath);

            $subcategoria->imagen = '/imagenes/subcategorias/'.$filePath;
            // dd($categoria->imagen);

            // delete old image
            \File::delete(public_path().$subcategoria->imagen);
            // Get image file
            $image = $request->file('imagen');
            // dd($image);
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/categorias/', $filePath);

            $subcategoria->imagen = '/imagenes/categorias/'.$filePath;
        }
        // Persist user record to database
        $subcategoria->save();
        //y gaurdamos la relacion
        // $subcategoria->categorias()->sync($request->categorias);

        return redirect()->route('subcategorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $subcategoria = SubCategoria::find($id);
        $local = Local::first();
        if (!empty($local)) {
            $local->subCategorias()->detach($id);
        }

        // Categoria::destroy($id);
        // $subcategoria->categorias()->detach($id);

        SubCategoria::destroy($id);

        return redirect()->route('subcategorias.index');
    }

    public function import() 
    {
        Excel::import(new SubcategoriaImport, 'subcategorias.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
