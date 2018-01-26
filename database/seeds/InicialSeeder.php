<?php
use Illuminate\Database\Seeder;

class InicialSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('authroles')->insert(
                [
                'rolid'       => 1,
                'nombre'      => 'CS Backdoor',
                'descripcion' => 'Backdoor Rol',
                'created_at'  => date_create(),
                'updated_at'  => date_create()
                ]
            );

        DB::table('authusuarios')->insert(
                [
                'usuarioid'  => 1,
                'email'      => 'cs@cs.com.gt',
                'password'   => '$2y$10$zOrPimtXtgVXl/nphcryoeo/mxS0oB6uBQZpmZFIB8M8ad1wc9vMi',
                'nombre'     => 'CS',
                'activo'     => 1,
                'created_at' => date_create(),
                'updated_at' => date_create()
                ]
            );

        DB::table('authusuarioroles')->insert([
                'usuarioid' => 1,
                'rolid'     => 1,
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]);

        DB::statement('INSERT INTO authrolmodulopermisos (rolid, modulopermisoid, created_at, updated_at)
				SELECT 1, modulopermisoid, NOW(), NOW() FROM authmodulopermisos');


        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
