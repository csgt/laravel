<?php
use Illuminate\Database\Seeder;
use App\Models\Auth\Module;

class ModulosSeeder extends Seeder
{
    public function run()
    {
        Module::truncate();
        Module::insert([
            ['moduloid' => 1, 'nombre' => 'index', 'nombrefriendly' => 'Inicio'],
            ['moduloid' => 2, 'nombre' => 'usuarios', 'nombrefriendly' => 'Usuarios'],
            ['moduloid' => 3, 'nombre' => 'roles', 'nombrefriendly' => 'Roles'],
            ['moduloid' => 4, 'nombre' => 'perfil', 'nombrefriendly' => 'Perfil'],
        ]);
    }
}
