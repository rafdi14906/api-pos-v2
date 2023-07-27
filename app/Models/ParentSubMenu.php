<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get all of the childSubMenus for the menu.
     */
    public function childSubMenus(): HasMany
    {
        return $this->hasMany(ChildSubMenu::class);
    }
}
