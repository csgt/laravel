<?php
namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function parent()
    {
        return $this->hasOne(self::class, 'parent_id');
    }
}
