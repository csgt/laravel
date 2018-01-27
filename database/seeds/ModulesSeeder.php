<?php
use Illuminate\Database\Seeder;
use App\Models\Auth\Module;

class ModulesSeeder extends Seeder
{
    public function run()
    {
        $modules = new Modules;


        echo($modules->get()->filter(function ($module) {
            return $module->permissions !== [];
        }));
        // Module::truncate();
        // Module::insert([
        //     ['id' => 1, 'name' => 'index', 'description' => 'Inicio'],
        //     ['id' => 2, 'name' => 'usuarios', 'description' => 'Usuarios'],
        //     ['id' => 3, 'name' => 'roles', 'description' => 'Roles'],
        //     ['id' => 4, 'name' => 'perfil', 'description' => 'Perfil'],
        // ]);
    }
}
