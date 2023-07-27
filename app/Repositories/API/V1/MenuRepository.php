<?php

namespace App\Repositories\API\V1;

use App\Models\Menu;

class MenuRepository
{
    protected Menu $menu;

    public function __construct()
    {
        $this->menu = new Menu();
    }

    public function get(array $request)
    {
        return $this->menu
            ->with(['parentSubMenus', 'parentSubMenus.childSubMenus'])
            ->find(1);
    }
}