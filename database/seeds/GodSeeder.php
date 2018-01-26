<?php
use Illuminate\Database\Seeder;

class GodSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::statement('DELETE FROM authrolmodulopermisos WHERE rolid=1');

        DB::statement('INSERT INTO authrolmodulopermisos (rolid, modulopermisoid, created_at, updated_at)
				SELECT 1, modulopermisoid, NOW(), NOW() FROM authmodulopermisos');


        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
