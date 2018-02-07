<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::truncate();

        Permission::insert([
            [
                'id'          => 1,
                'name'        => 'index',
                'description' => 'Ver',
            ],
            [
                'id'          => 2,
                'name'        => 'create',
                'description' => 'Crear',
            ],
            [
                'id'          => 3,
                'name'        => 'store',
                'description' => 'Guardar',
            ],
            [
                'id'          => 4,
                'name'        => 'edit',
                'description' => 'Editar',
            ],
            [
                'id'          => 5,
                'name'        => 'update',
                'description' => 'Actualizar',
            ],
            [
                'id'          => 6,
                'name'        => 'destroy',
                'description' => 'Borrar',
            ],
            [
                'id'          => 7,
                'name'        => 'data',
                'description' => 'Obtener datos',
            ],
            [
                'id'          => 8,
                'name'        => 'show',
                'description' => 'Información',
            ],
        ]);
    }
}
