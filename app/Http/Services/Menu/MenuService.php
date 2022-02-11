<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function show() {
        return Menu::select('name','id')
            ->where('parent_id',0)
            ->orderBy('id','ASC')
            ->get();
    }

    public function getAll(){

        return Menu::orderBy('id','ASC')->paginate(10);
    }

    public function getId($id){

      return Menu::where('id',$id)
          ->where('active',1)
          ->firstOrFail();
    }


    public function create($request){

        try {
            Menu::create([
                'name'=>(string) $request->input('name'),
                'parent_id'=>(int) $request->input('parent_id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'active'=>(int) $request->input('active'),
            ]);

            Session::flash('success','Tao danh muc thanh cong');
        }catch (\Exception$err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function update($menu,$request){

        if($request->input('parent_id') != $menu->id){
            $menu->fill($request->input());
            $menu->save();
            Session::flash('success','Up date thành công!!');
       }
        else{
            Session::flash('error','Up date ko thành công!!');
        }
        //return true;
    }

    public  function destroy ($request){

        $id = $request->input();
        $menu = Menu::where('id',$id)->first();
        if ($menu){
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }
        return  false;
    }

    public function getProductOne($menu){
        return $menu->products()->select('id','name','price','price_sale','thumb')
                    ->where('active',1)
                    ->orderBy('id','ASC')
                    ->paginate(15);
    }
}
