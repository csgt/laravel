<?php
use Illuminate\Database\Seeder;

class ModulopermisosSeeder extends Seeder
{
    private $inserts = [];
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('authmodulopermisos')->truncate();

        $this->add(1, 1); //Inicio
            $this->add(2); //Usuario
            $this->add(3); //Roles
            $this->add(4, [1,3]); //Perfil

            DB::table('authmodulopermisos')->insert($this->inserts);
        DB::statement('UPDATE authmodulopermisos SET created_at=NOW(), updated_at=NOW()');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    private function add($aModulo, $aPermisos = [1,2,3,4,5,6,7])
    {
        if (!is_array($aPermisos)) {
            $aPermisos = [$aPermisos];
        }
        foreach ($aPermisos as $permiso) {
            $this->inserts[] = ['moduloid' => $aModulo, 'permisoid' => $permiso];
        }
    }
}
