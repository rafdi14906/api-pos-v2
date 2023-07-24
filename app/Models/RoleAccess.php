<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'menu_id',
        'parent_sub_menu_id',
        'child_sub_menu_id',
        'create',
        'read',
        'update',
        'delete',
        'print',
        'created_by',
        'updated_by',
    ];
}
