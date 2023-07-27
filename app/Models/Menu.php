<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    /**
     * Get all of the parentSubMenus for the menu.
     */
    public function parentSubMenus(): HasMany
    {
        return $this->hasMany(ParentSubMenu::class);
    }

    /**
     * Get all of the childSubMenus for the menu.
     */
    public function childSubMenus(): HasManyThrough
    {
        return $this->hasManyThrough(ChildSubMenu::class, ParentSubMenu::class, 'menu_id', 'parent_sub_menu_id', 'id', 'id');
    }
}
