<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class RoleModulePermission extends Model {
    protected $guarded = ['id'];

    public function module_permission()
    {
        return $this->belongsTo(ModulePermission::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
