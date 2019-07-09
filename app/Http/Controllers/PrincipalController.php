<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\SubCategoria;

class PrincipalController extends Controller
{
    public function inicio()
    {
    	return view ('principal.inicio');
    }

    public function categorias()
    {
    	$categorias = Categoria::where('estado', 1)->get();
    	return view ('principal.categorias', compact('categorias'));
    }
    
    public function subcategorias($id)
    {
    	$categoria = Categoria::find($id);
    	return view ('principal.subcategorias', compact('categoria'));
    }

}
