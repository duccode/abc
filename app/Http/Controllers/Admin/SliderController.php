<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequsest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function create()
    {
        return view('admin.slider.add',[
           'title'=> 'Thêm slider',
        ]);
    }

    public function store(SliderRequsest $request){

        $this->slider->insert($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.slider.list',[
            'title' => 'Danh sach slider',
            'sliders' => $this->slider->getSlider(),
            ]);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->slider->update($request,$slider);
        return redirect()->back();
    }

    public function show(Slider $slider) {
        return view('admin.slider.edit',[
            'title' => 'Sửa slider',
            'sliders' => $slider
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->slider->delete($request);
        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!!',
            ]);
        }
        return response()->json([
            'error' => true,
        ]);

    }
}
