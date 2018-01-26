<?php
use Illuminate\Database\Seeder;

use App\Models\Cancerbero\Authmodulo;
use App\Models\Cancerbero\Authpermiso;
use App\Models\Cancerbero\Authmodulopermiso;

class MenuSeeder extends Seeder
{
    private $modulos = [];
    private $permisos = [];
    private $inserts = [];

    public function run()
    {
        $this->modulos  = Authmodulo::select('moduloid', 'nombre')->get();
        $this->permisos = Authpermiso::select('permisoid', 'nombre')->get();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('authmenu')->truncate();

        $this->add('index', 'Inicio', 1000, null, 'fa fa-home');
        $this->add('catalogos', 'Catálogos', 2000, null, 'fa fa-book');
        $this->add('usuarios', 'Usuarios', 100, 2, 'fa fa-user');
        $this->add('roles', 'Roles', 200, 2, 'fa fa-key');

        DB::table('authmenu')->insert($this->inserts);

        DB::statement('UPDATE authmenu SET created_at=NOW(), updated_at=NOW()');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    private function add($aModulo, $aNombre, $aOrden, $aPadreId=null, $aIcono=null, $aPermiso='index')
    {
        try {
            $moduloid        = $this->modulos->where('nombre', $aModulo)->first()->moduloid;
            $permisoid       = $this->permisos->where('nombre', $aPermiso)->first()->permisoid;
            $modulopermisoid = Authmodulopermiso::where('moduloid', $moduloid)->where('permisoid', $permisoid)->first()->modulopermisoid;
        } catch (Exception $e) {
            $modulopermisoid = null;
        }

        $this->inserts[] = [
            'padreid'            => $aPadreId,
            'modulopermisoid' => $modulopermisoid,
            'nombre'             => $aNombre,
            'orden'                    => $aOrden,
            'icono'             => $aIcono,
            ];
    }
}
