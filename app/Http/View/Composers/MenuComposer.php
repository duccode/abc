<?php

namespace App\Http\View\Composers;
use App\Models\Menu;
use Illuminate\View\View;
use App\Repositories\UserRepository;
class MenuComposer
{

    protected $users;


    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...

    }


    public function compose(View $view)
    {
        $menus = Menu::select('id','name','parent_id')->where('active',1)->orderBy('id','ASC')->get();
        $view->with('menus',$menus);

    }
}
