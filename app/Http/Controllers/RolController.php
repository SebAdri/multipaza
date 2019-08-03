<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('id','>',1)->get();
        return view('auth.roles.lista', compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos= Permission::orderBy('modulo')->orderBy('name')->get();
        $modulos = $permisos->pluck('modulo')->unique();
        return view('auth.roles.alta', compact('permisos','modulos'));
    }

    /**e
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->nombre, 'descripcion'=> $request->descripcion]);
        $role->syncPermissions($request->permiso);
        return redirect()->route('roles.index');
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
        $rol = Role::find($id);
        $permisos= Permission::orderBy('modulo')->orderBy('name')->get();
        $modulos = $permisos->pluck('modulo')->unique();

        return view('auth.roles.editar', compact('rol', 'permisos', 'modulos'));
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
        $role =Role::find($id);
        $role->name = $request->nombre;
        //$role->descripcion = $request->descripcion;
        $role->syncPermissions($request->permiso);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->revokePermissionTo($role->getPermissionNames());

        $role->destroy($id);
        return redirect()->route('roles.index');
    }
}
