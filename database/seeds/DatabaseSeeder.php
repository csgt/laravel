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
        $this->call('ModulesSeeder');
        // $this->call('PermissionsSeeder');
        // $this->call('ModulopermisosSeeder');
        // $this->call('MenuSeeder');
        Schema::disableForeignKeyConstraints();
        Model::reguard();
    }
}
