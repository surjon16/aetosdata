<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function accounts() {
        return $this->hasMany('App\Models\Account');
    }
    public function sidebar() {
        return $this->belongsToMany('App\Models\Sidebar', 'sidebar_role_access');
    }
}
