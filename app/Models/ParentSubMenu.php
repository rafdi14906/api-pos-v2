<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentSubMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'name',
        'path',
        'icon',
        'order_number',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
