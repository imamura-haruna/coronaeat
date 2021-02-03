<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下各Modelが扱えるようになる
use App\User;
use App\Image;
use App\Checkbox;
//edit アクションで使用
use Auth;

class ShopController extends Controller
{
    public function add(Request $request)
    {
      //Userについて
      // Validationをかける
      $this->validate($request, User::$rules);
      // News Modelからデータを取得する
      $users = User::find($request->id);
      // 送信されてきたフォームデータを格納する
      $user = $request->all();
      unset($user['_token']);
      // 該当するデータを上書きして保存する
      $users->fill($user)->save();
      
      //Checkboxについて
      // Validationをかける
      $this->validate($request, Checkbox::$rules);
      // News Modelからデータを取得する
      $checkboxes = Checkbox::find($request->id);
      // 送信されてきたフォームデータを格納する
      $checkbox = $request->all();
      unset($checkbox['_token']);
      // 該当するデータを上書きして保存する
      $checkboxes->fill($checkbox)->save();
      
      // Image Modelからデータを取得する
      $images = Image::find($request->id);
      // 送信されてきたフォームデータを格納する
      $image_form = $request->all();
      if ($request->remove == 'true') {
          $image_form['shop_image'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $images->shop_image = basename($path);
      } else {
          $image['shop_image'] = $images->image_path;
      }
      
      //フォームから送信されてきた_tokenを消去する
      unset($form['_token']);
      //フォームから送信されてきたimageを消去する
      unset($form['image']);
      unset($image_form['remove']);
      unset($image_form['_token']);
      // 該当するデータを上書きして保存する
      $images->fill($image_form)->save();
      
      //post時はredirect
      return redirect('admin/shop/information');
    }
    
    public function new(Request $request)
    {
      //Varidationを行う
      $this->validate($request, Image::$rules);
      
      $image = new Image;
      $form = $request->all();
      
      //フォームから画像が送信されてきたら、保存して、$image->shop_image に画像パスを保存する
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $image->shop_image = Storage::disk('s3')->url($path);
      } else {
          $image->shop_image = null;
      }
      
      //フォームから送信されてきた_tokenを消去する
      unset($form['_token']);
      //フォームから送信されてきたimageを消去する
      unset($form['image']);
      
      //データベースに保存する
      $image->fill($form);
      $image->save();
      
      //post時はredirect
      return redirect('admin/shop/information');
    }
    
    public function show(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      $images = Image::all();
      $checkboxes = Checkbox::all();
      
      return view('admin.shop.information',['images'=>$images,'checkboxes'=>$checkboxes]);
    }
    
    public function edit(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      
      $images=Image::all();
      $checkboxes=Checkbox::find($request->id);
      
      return view('admin.shop.edit',['user'=>$user,'images'=>$images,'checkbox'=>$checkboxes]);
    }
    
    public function delete()
    {
      return redirect('admin/shop/edit');
    }
    
    public function choice()
    {
      // User Modelからデータを取得する
      $users = User::find($request->id);
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
