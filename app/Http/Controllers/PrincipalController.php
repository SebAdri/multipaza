<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use App\Categoria;
use App\SubCategoria;
use App\Local;
use App\Configuracion;
use App\PalabraClave;
use App\LocalPivot;
use App\PalabraPivot;

class PrincipalController extends Controller
{
    public function inicio()
    {
    	
        $con = Configuracion::first();
        return view ('principal.inicio', compact('con'));
    }

    public function categorias()
    {
    	$categorias = Categoria::where('estado', 1)->get();
        $titulo = "Categorias";
        $direccion="subcategoria";
        $volver = "/";
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $locales = Local::orderBy('nombre', 'ASC')->get();
        return view ('principal.detalleCategoria', compact('categorias', 'palabrasClaves', 'titulo','direccion', 'volver', 'locales'));
    }
    
    public function subcategorias($id)
    {
        $relaciones = LocalPivot::select('subcategoria_id')->where('categoria_id',$id)->distinct()->pluck('subcategoria_id');
        $categorias = SubCategoria::find($relaciones);
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $titulo = Categoria::find($id)->nombre;
        $direccion="locales";
        $volver = '/Categorias';
        $locales = Local::orderBy('nombre', 'ASC')->get();
        return view ('principal.detalleCategoria', compact('categorias','id', 'titulo', 'direccion','palabrasClaves', 'volver', 'locales'));
    }

    public function locales($id, $categoria)
    {
        $categoria_id = Categoria::where('nombre',$categoria)->value('id');
        $locales_relaciones = LocalPivot::select('local_id')->where('categoria_id',$categoria_id)->where('subcategoria_id', $id)->distinct()->pluck('local_id');
        $localesDependientes = Local::find($locales_relaciones);
        $locales = Local::all();
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $volver = '/subcategoria/'.$id;
        return view ('principal.detalleLocal', compact('locales', 'id', 'categoria_id', 'palabrasClaves', 'volver', 'localesDependientes'));
    }

    public function filtros(Request $request)
    {
        $ids = PalabraPivot::select('local_id')->whereIn('palabrasclaves_id', $request->palabras_id)->get()->pluck('local_id');

        $localesFiltrados = Local::whereIn('id', $ids)->get();
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $locales = Local::all();
        return view ('principal.filtro', compact('locales', 'palabrasClaves', 'localesFiltrados'));
    }

    public function buscar()
    {
        $tipo = Input::get('tipo');
        $id = Input::get('id');
        if ($tipo=='palabra') {
            $ids = PalabraPivot::select('local_id')->where('palabrasclaves_id', $id)->get()->pluck('local_id');
            $localesFiltrados = Local::whereIn('id', $ids)->get();
        }else{
            $localesFiltrados = Local::where('id', $id)->get();
        }
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $locales = Local::all();
    // return $localesFiltrados;
        return view ('principal.detalleFiltro', compact('locales', 'palabrasClaves', 'localesFiltrados'));
    }

    public function getLocalesPalabras(Request $request)
    {
        $request->option = "buscador";
        $palabras = PalabraClave::all();
        if ($request->option == "buscador") {
            $locales = Local::all();
            $var = $locales->concat($palabras);
        }
        else
        {
            $var = $palabras;
        }
        return $var;
    }

}
