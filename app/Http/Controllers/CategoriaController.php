<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreCategoriaRequest;
use App\Categoria;
use Illuminate\Support\Facades\File;

use App\Imports\CategoriaImport;
use Maatwebsite\Excel\Facades\Excel;
class CategoriaController extends Controller
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
        $categorias = Categoria::all();
        return view('categoria.lista',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('categoria.alta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->estado = $request->estado == "on"? 0:1;
        // return $request;
        
        // Categoria::create(array_slice($request->all(),1));
        $categoria = new Categoria;
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        // dd($request->has('estado'));
        // $categoria->estado = $request->has('estado')? 1:0;
        $categoria->estado = 1;

        // dd($categoria->estado);        
        // Check if a profile image has been uploaded
        if ($request->has('imagen')) {
            // Get image file
            $image = $request->file('imagen');
            
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/categorias/', $filePath);

            $categoria->imagen = '/imagenes/categorias/'.$filePath;
            // dd($categoria->imagen);
        }
        // Persist user record to database
        $categoria->save();

        return redirect()->route('categorias.index');
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
        $categoria = Categoria::find($id);
        return view('categoria.editar', compact('categoria'));
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
        $categoria = Categoria::find($id);
        // $categoria->fill(array_slice($request->all(),2))->save();

        // $categoria = new Categoria;
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        // dd($request->has('estado'));
        $categoria->estado = $request->has('estado')? 1:0;
        // dd($categoria->estado);
        // Check if a profile image has been uploaded
        if ($request->has('imagen')) {
            // delete old image
            \File::delete(public_path().$categoria->imagen);
            // Get image file
            $image = $request->file('imagen');
            // dd($image);
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('nombre')).'_'.time();
            
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();

            $image->move('imagenes/categorias/', $filePath);

            $categoria->imagen = '/imagenes/categorias/'.$filePath;
        }
        // Persist user record to database
        $categoria->save();
        
        return redirect()->route('categorias.index');
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
        $categoria = Categoria::find($id);
        $local = Local::first();
        if (!empty($local)) {
            $local->categorias()->detach($id);
        }

        Categoria::destroy($id);

        return redirect()->route('categorias.index');
    }

    public function import() 
    {
        Excel::import(new CategoriaImport, 'CategoriasMultiplaza.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
