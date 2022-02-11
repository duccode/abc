<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use http\Env\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insert($request){

        try {
            $request->except('_token');
            Slider::create($request->input());
            Session::flash('success','Them slider thanh cong');
        }
        catch (\Exception $err) {
            Session::flash('error','Them slider that bai');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function getSlider(){
        return Slider::orderBy('id','ASC')->paginate(15);
    }

    public function update ($request,$slider){
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success','Update dữ liệu thành công!!');
        } catch (\Exception $err)
        {
            Session::flash('error','Update dữ liệu thất bại!!');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $slider = Slider::where('id',$request->input('id'))->first();
        if($slider){
            $path =str_replace('storage','public',$slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }

    public function show() {
        return Slider::where('active',1)->orderBy('sort_by','ASC')->get();
    }
}
