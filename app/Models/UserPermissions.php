<?php namespace App;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    protected $guarded = [];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'id', 'permission_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'id', 'user_id');
    }
}