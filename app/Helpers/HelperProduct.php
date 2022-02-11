<?php

namespace App\Helpers;

class HelperProduct
{
    public static function Product ($products){
        $html = '';

        foreach ($products as  $key => $product){
                $html .= '
                    <tr>
                        <td>'.$product->id.'</td>
                        <td>'.$product->name.'</td>
                        <td>'.$product->menu->name.'</td>
                        <td>'.$product->price.'</td>
                        <td>'.$product->price_sale.'</td>
                        <td><a href="'.$product->thumb.'" target="_blank"><img src="'.$product->thumb.'" width="40px"></a></td>
                        <td>'.self::active($product->active).'</td>
                        <td>'.$product->updated_at.'</td>
                        <td>
                            <a href="/admin/products/edit/'.$product->id.'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="RemoveRow('.$product->id.', \'/admin/products/destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';

                unset($product[$key]);
            }

        return $html;
    }

    public static function active($active = 0):string
    {
        return $active == 0 ?'<span class="btn btn-danger btn-xs">NO</span>':
            '<span class="btn btn-success btn-xs">YES</span>';
    }
}
