<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CategoriaSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permission = new Permission;
    	$permission->name = 'Editar_Categoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Categoria';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Agregar_Categoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Categoria';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Eliminar_Categoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Categoria';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Listar_Categoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Categoria';
    	$permission->save();
        ////////////////////////
    	$permission = new Permission;
    	$permission->name = 'Editar_Subcategoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Subcategoria';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Agregar_Subcategoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Subcategoria';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Eliminar_Subcategoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Subcategoria';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Listar_Subcategoria';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Subcategoria';
    	$permission->save();
        ///////////////////////////////////////
    	$permission = new Permission;
    	$permission->name = 'Listar_Usuarios';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Usuarios';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Editar_Usuarios';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Usuarios';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Agregar_Usuarios';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Usuarios';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Eliminar_Usuarios';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Usuarios';
    	$permission->save();
        /////////////////////////////////////

    	$permission = new Permission;
    	$permission->name = 'Editar_Locales';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Locales';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Agregar_Locales';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Locales';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Eliminar_Locales';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Locales';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Listar_Locales';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Locales';
    	$permission->save();
        ////////////////////////////
    	$permission = new Permission;
    	$permission->name = 'Editar_Palabras Claves';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Palabras Claves';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Agregar_Palabras Claves';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Palabras Claves';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Eliminar_Palabras Claves';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Palabras Claves';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Listar_Palabras Claves';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Palabras Claves';
    	$permission->save();
        /////////////////////////

    	$permission = new Permission;
    	$permission->name = 'Editar_Roles';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Roles';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Agregar_Roles';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Roles';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Eliminar_Roles';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Roles';
    	$permission->save();

    	$permission = new Permission;
    	$permission->name = 'Listar_Roles';
    	$permission->guard_name = 'web';
    	$permission->modulo = 'Roles';
    	$permission->save();
    }
}
