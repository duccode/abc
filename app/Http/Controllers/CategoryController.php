<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class CategoryController extends Controller
{
    protected  $menuService;
    public function __construct(MenuService $menuService)
    {
        $this ->menuService = $menuService;
    }

    public function index(Request $request, $id, $slug){

        $menu = $this->menuService->getId($id);
        $products = $this->menuService->getProductOne($menu);
        return view('home.menu',[
            'title' => $menu-> name,
            'products'=> $products,
            'menu'=>$menu,
        ]);
    }
}
