<?php
use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Models\Auth\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class InitialSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::insert([
            'rolid'       => 1,
            'nombre'      => 'CS Backdoor',
            'descripcion' => 'Backdoor Rol',
            'created_at'  => date_create(),
            'updated_at'  => date_create(),
        ]);

        User::insert([
            'usuarioid'  => 1,
            'email'      => 'cs@cs.com.gt',
            'password'   => '$2y$10$zOrPimtXtgVXl/nphcryoeo/mxS0oB6uBQZpmZFIB8M8ad1wc9vMi',
            'nombre'     => 'CS',
            'activo'     => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        UserRole::insert([
            'usuarioid'  => 1,
            'rolid'      => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::statement('INSERT INTO role_module_permissions (role_id, module_permission_id, created_at, updated_at)
				SELECT 1, module_permission_id, NOW(), NOW() FROM module_permissions');

        Schema::enableForeignKeyConstraints();
    }
}
