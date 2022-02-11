<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;

class ProductService
{
        const LIMIT = 16;
    public function getMenu(){
        return Menu::where('active',1)->get();
    }

    protected function isValidPrice($request){
        if ($request->input('price')!=0 && $request->input('price_sale')!=0
        &&$request->input('price_sale')>= $request->input('price')
        ){
            Session::flash('error','giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if ($request->input('price_sale')!=0 && $request->input('price') == 0 ){
            Session::flash('error','Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }

    public function insert($request){
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false){
            return false;
        }
        try {
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success','Thêm sản phẩm thành công!!');
        }
        catch (\Exception $error)
        {
            Session::flash('error','Thêm sản phẩm lỗi vui lòng thử lại!!');
            \Log::info($error->getMessage());
            return false;
        }
        return true;

    }

    public function update ($request,$product){
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false){
            return false;
        }
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success','Update dữ liệu thành công!!');
        } catch (\Exception $err)
        {
            Session::flash('error','Update dữ liệu thất bại!!');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function getProduct(){
        return Product::with('menu')
            ->orderBy('id','ASC')->paginate(10);
    }

    public function getProductNew($page = null){
        return Product::select('id','name','price','price_sale','thumb')
            ->orderByDesc('id')
            ->when($page!=null,function ($query) use ($page){
                $query->offset($page * self::LIMIT);
            })
            ->offset(10)
            ->limit(self::LIMIT)
            ->get();
    }

    public function delete($request){
        $product = Product::where('id',$request->input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}
