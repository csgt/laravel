<?php
use Illuminate\Database\Seeder;

use App\Models\Auth\Module;
use App\Models\Auth\ModulePermission;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $modules = Module::all();
        $sections = new Sections;
        $sections = $sections->get();

        Menu::truncate();

        foreach ($sections as $section) {
            $menuItem = new Menu;

            $menuItem->icon = $section->icon;
            $menuItem->name = $section->name;
            $menuItem->route = $section->module;
            $menuItem->order = $section->menuOrder;

            if($section->parentModule) {
                $parentModule = Menu::where('route', $section->parentModule)->value('id');
                $menuItem->parent_id = $parentModule;
            }

            $module = Module::where('name', $section->module)->first();
            if($module) {
                $modulePermission = ModulePermission::where('module_id', $module->id)
                    ->where('permission_id', 1)
                    ->value('id');
                $menuItem->module_permission_id = $modulePermission;
            }

            $menuItem->save();
        }
    }
}
