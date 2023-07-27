<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repositories\API\V1\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected MenuRepository $menu;

    public function __construct()
    {
        $this->menu = new MenuRepository();
    }

    public function index(Request $request)
    {
        $data = $this->menu->get($request->all());

        return $this->success($data);
    }
}
