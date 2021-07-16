<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    use HasFactory;

    protected $table = 'component_sidebar';

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'sidebar_role_access');
    }
}
