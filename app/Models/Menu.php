<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
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
