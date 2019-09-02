<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PalabraClave;
use App\Local;

use App\Imports\PalabrasClavesImport;
use App\Imports\PalabrasClavesPivotImport;
use Maatwebsite\Excel\Facades\Excel;

class PalabrasClavesController extends Controller
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
        // dd($this->user );
        // dd(\Auth::user()->id);
        $locales = Local::where('estado', 1)->get();
        $palabras = PalabraClave::all();
        return view('palabraClave.lista', compact('locales','palabras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $locales = Local::where('estado', 1)->get();
        return view('palabraClave.alta', compact('locales'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        foreach (explode(',',$request->tags_1) as $word) {

            $palabra = PalabraClave::firstOrCreate(['palabras'=> $word]);
            $palabra->locales()->attach($request->locales);
        
        }

        
        return redirect()->route('palabrasClaves.index');

        // PalabraClave::create($palabra);
        
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
        $locales = Local::where('estado', 1)->get();
        $palabra = PalabraClave::find($id);
        return view('palabraClave.editar', compact('palabra', 'locales'));
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

        $palabra = PalabraClave::find($id);
        // $pa
        foreach (explode(',',$request->tags_1) as $word) {
            $palabra->palabras = $word;
            $palabra->save();

            // $palabra->locales()->attach($request->locales);
            $palabra->locales()->sync($request->locales);

        }

        
        return redirect()->route('palabrasClaves.index');
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
        $palabra = PalabraClave::find($id);
        $palabra->locales()->detach();

        PalabraClave::destroy($id);

        return redirect()->route('palabrasClaves.index');
    }

    public function importPalabras() 
    {
        Excel::import(new PalabrasClavesImport, 'palabrasClaves.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function importPalabrasPivot() 
    {
        Excel::import(new PalabrasClavesPivotImport, 'PalabrasclavesPivot.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}


