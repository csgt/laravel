<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        $this->call('ModulesSeeder');
        $this->call('PermissionsSeeder');
        $this->call('ModulePermissionsSeeder');
        $this->call('MenuSeeder');
        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
