<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarRoleAccess extends Model
{
    use HasFactory;

    protected $table = 'sidebar_role_access';

    public function role() {
        return $this->belongsToMany('App/Models/Role');
    }

    public function sidebar() {
        return $this->belongsToMany('App/Models/Sidebar');
    }
}
