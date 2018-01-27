<?php
use Csgt\Cancerbero\CsgtModule;

// new CsgtModule($aName, $aDescription, $aModule, $aMenuOrder, [$aIcon, $aParentModule, $aPermissions])

class Modules
{
    public function get()
    {
        return collect([
            new CsgtModule('Inicio', 'Inicio', 'index', 1000, 'fa fa-home', null, CsgtModule::INDEX),
            new CsgtModule('Catálogos', '', 'catalogos', 2000, 'fa fa-book', null, []),
            new CsgtModule('Usuarios', 'Catálogos - Usuarios', 'catalogos.usuarios', 100, 'fa fa-user', 'catalogos'),
            new CsgtModule('Roles', 'Catálogos - Roles', 'catalogos.roles', 200, 'fa fa-key', 'catalogos'),
        ]);
    }
}
