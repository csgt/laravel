<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        Schema::enableForeignKeyConstraints();
        $this->call('ModulosSeeder');
        $this->call('PermisosSeeder');
        $this->call('ModulopermisosSeeder');
        $this->call('MenuSeeder');
        Schema::disableForeignKeyConstraints();
        Model::reguard();
    }
}
