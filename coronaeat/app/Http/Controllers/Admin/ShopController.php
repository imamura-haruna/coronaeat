<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下各Modelが扱えるようになる
use App\User;
use App\Image;
use App\Checkbox;

class ShopController extends Controller
{
    //Requestクラス：ブラウザを通してユーザーから送られる情報をすべて含んでいるオブジェクトを取得することができる
    //$requestに代入して使用する
    public function add(Request $request)
    {
      //post時はredirect
      return redirect('admin/shop/information');
    }
    
    public function show()
    {
      return view('admin.shop.information');
    }
    
    
    public function edit()
    {
      return view('admin.shop.edit');
    }
    
    public function delete()
    {
      return redirect('admin/shop/edit');
    }
    
    public function choice()
    {
      return view('admin.shop.choice');
    }
    
    public function login()
    {
      return redirect('auth/login');
    }
    
    public function create()
    {
      return view('admin.shop.create');
    }
    
}
