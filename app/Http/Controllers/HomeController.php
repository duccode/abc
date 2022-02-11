<?php

namespace App\Http\Controllers;

use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Menu\MenuService;

class HomeController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('home.main',[
            'title' => 'Shop Giá Rẻ',
            'sliders' => $this->slider->show(),
            'menus' =>$this->menu->show(),
            'products' => $this->product->getProductNew(),
        ]);
    }


    public function loadProduct(Request $request)
    {
        $page = $request->input('page',0);
        $result = $this->product->getProductNew($page);
        if(count($result) != 0){
            $html = view('products.list',['products' =>$result ])->render();
            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json([
            'html' => ''
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
