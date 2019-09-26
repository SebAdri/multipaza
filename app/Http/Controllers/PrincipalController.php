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

        // dd($categorias);
        return view ('principal.categorias3', compact('categorias', 'palabrasClaves', 'titulo','direccion', 'volver', 'locales'));
    }
    
    public function subcategorias($id)
    {
        $relaciones = LocalPivot::select('subcategoria_id')->where('categoria_id',$id)->distinct()->pluck('subcategoria_id');
        // return $relaciones;
    	// $subcategorias_relaciones = Categoria::find($id)->subcategorias()->select('categoria_id', 'subcategoria_id')->distinct()->pluck('subcategoria_id');
        // $subcategorias_relaciones = Categoria::find($id)->subcategorias();

        // dd($subcategorias_relaciones);
        // $categorias = SubCategoria::find($subcategorias_relaciones);
        $categorias = SubCategoria::find($relaciones);
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $titulo = Categoria::find($id)->nombre;
        $direccion="locales";
        $volver = '/Categorias';
        $locales = Local::orderBy('nombre', 'ASC')->get();
        // dd($subcategorias);
    	//return view ('principal.subcaterias', compact('subcategorias','id'));
        return view('principal.html3');
        return view ('principal.categorias2', compact('categorias','id', 'titulo', 'direccion','palabrasClaves', 'volver', 'locales'));
    }

    public function locales($id, $categoria)
    {
        $categoria_id = Categoria::where('nombre',$categoria)->value('id');
        // dd($categoria_id);
        // $locales_relaciones = SubCategoria::find($id)->locales()->select('subcategoria_id', 'local_id')->distinct()->where('categoria_id',$categoria_id)->pluck('local_id');
        $locales_relaciones = LocalPivot::select('local_id')->where('categoria_id',$categoria_id)->where('subcategoria_id', $id)->distinct()->pluck('local_id');
        // dd($locales_relaciones);
        $localesDependientes = Local::find($locales_relaciones);
        $locales = Local::all();
        // $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->pluck('palabras');
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $volver = '/subcategoria/'.$id;
        // return ($palabrasClaves);
        return view ('principal.index', compact('locales', 'id', 'categoria_id', 'palabrasClaves', 'volver', 'localesDependientes'));
    }

    public function filtros(Request $request)
    {
        $ids = PalabraPivot::select('local_id')->whereIn('palabrasclaves_id', $request->palabras_id)->get()->pluck('local_id');
        // dd($ids);

        $localesFiltrados = Local::whereIn('id', $ids)->get();
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $locales = Local::all();
        // return $locales;
        return view ('principal.filtro', compact('locales', 'palabrasClaves', 'localesFiltrados'));
    }

    public function buscar()
    {
        // dd($request->palabras);
        //return view ('principal.filtro', compact('locales', 'palabrasClaves'));
        $tipo = Input::get('tipo');
        $id = Input::get('id');
        //return $id;
        if ($tipo=='palabra') {
            $ids = PalabraPivot::select('local_id')->where('palabrasclaves_id', $id)->get()->pluck('local_id');
            $localesFiltrados = Local::whereIn('id', $ids)->get();
        }else{
            $localesFiltrados = Local::where('id', $id)->get();
        }
        $palabrasClaves = PalabraClave::orderBy('palabras', 'ASC')->get();
        $locales = Local::all();
        // $id= 0;
        // categoria_id = 0;
        // dd($palabrasClaves[0]->locales()->get());
        // return $locales;
        // return $locales;
        return view ('principal.filtro', compact('locales', 'palabrasClaves', 'localesFiltrados'));
    }

    public function getLocalesPalabras(Request $request)
    {
        // dd($request->option);
        // $request->option = "buscador";
        $palabras = PalabraClave::all();
        if ($request->option == "buscador") {
            $locales = Local::all();
            $var = $locales->concat($palabras);
        }
        else
        {
            $var = $palabras;
        }
        // dd($request->option);
        return $var;
    }

}
