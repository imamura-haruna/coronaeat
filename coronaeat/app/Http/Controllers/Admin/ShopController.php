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
      
      
      //Imageについて
      // Validationをかける
      $this->validate($request, Image::$rules);
      // Image Modelからデータを取得する
      $images = Image::find($request->id);
      // 送信されてきたフォームデータを格納する
      $image_form = $request->all();
      if ($request->remove == 'true') {
          $image_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
          $images->image_path = Storage::disk('s3')->url($path);
      } else {
          $image_form['image_path'] = $news->image_path;
      }
      unset($image_form['image']);
      unset($image_form['remove']);
      unset($image_form['_token']);
      // 該当するデータを上書きして保存する
      $image->fill($image_form)->save();
      
      //post時はredirect
      return redirect('admin/shop/information',['images'=>$images,'checkboxes'=>$checkboxes]);
    }
    
    public function new(Request $request)
    {
      
      //Varidationを行う
      $this->validate($request, Image::$rules);
      //dd($request);
      
      $image = new Image;
      $form = $request->all();
      
      //フォームから画像が送信されてきたら、保存して、$image->shop_image に画像パスを保存する
      //if (isset($form['image'])) {
      //  $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        // $image->shop_image = Storage::disk('s3')->url($path);
      // } else {
          // $image->shop_image = null;
      // }
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $image->shop_image = basename($path);
      } else {
          $image->shop_image = null;
      }
      $image->user_id = Auth::id();
      
      //フォームから送信されてきた_tokenを消去する
      unset($form['_token']);
      //フォームから送信されてきたimageを消去する
      unset($form['image']);
      
      //データベースに保存する
      $image->fill($form);
      $image->save();
      $images = Image::all();
      $checkboxes = Checkbox::all();
      //post時はredirect
      return redirect('admin/shop/information',['images'=>$images,'checkboxes'=>$checkboxes]);
    }
    
    public function show(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      $images = Image::find($user->id);
      
      $checkboxes = Checkbox::find($user->id);
      if($checkboxes!=""){
        echo "clear";
      }else{
        echo "";
      }
      
      //if(['checkbox'] != ''){
        //echo "clear";
      //}else{
        //echo "";
      //}
      //if($checkboxes != ""){
       // echo "clear";
      //}else{
      //  $checkboxes = null;
      //}
      
      return view('admin.shop.information',['images'=>$images,'checkbox'=>$checkboxes]);
    }
    
    public function edit(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      
      $images=Image::all();
      $checkboxes=Checkbox::find($request->id);
      
      return view('admin.shop.edit',['user'=>$user,'images'=>$images,'checkbox'=>$checkboxes]);
    }
    
    public function update(Request $request)
    {
        //Userについて
        //ユーザー登録時にデフォルト値を入れているから、新規作成はしなくていい
        // 特定ユーザーの情報を取得（既ログイン者）
        $user = Auth::user();
        //$userのプロパティにフォームから送られてきた情報を渡す
        $user->update(); //更新
        // 送信されてきたフォームデータを格納する
        // $user = $request->all();
        // unset($user['_token']);
        // 該当するデータを上書きして保存する
        // $users->fill($user)->save();
        
        //Checkboxについて
        // 該当しない項目があるためValidationをかけない
        //$this->validate($request, Checkbox::$rules);
        // Chekbox Modelからデータを取得する
        $checkboxes = Checkbox::find($request->id);
        // 送信されてきたフォームデータを格納する
        $checkbox = $request->all();
        unset($checkbox['_token']);
        // 該当するデータを上書きして保存する
        $checkboxes->fill($checkbox);
        $checkboxes->save();
        
        // Validationをかける
        $this->validate($request, Image::$rules);
        // News Modelからデータを取得する
        $images = Image::find($request->id);
        $image = $request->all();
        // 送信されてきたフォームデータを格納する
        if ($request->remove == 'true') {
            $image['shop_image'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $image['shop_image'] = basename($path);
        } else {
            $image['shop_image'] = $images->shop_image;
        }
        
        unset($image['image']);
        unset($image['remove']);
        unset($image['_token']);
        // 該当するデータを上書きして保存する
        $images->fill($image)->save();
          
        return redirect('admin/shop/edit',['image'=>$images,'checkbox'=>$checkboxes]);
    }
    
    public function delete(Request $request)
    {
      //該当するNews Modelを取得する
      $image = Image::find($request->id);
      //消去する
      $image->delete();
      
      return redirect('admin/shop/information');
    }
    
    public function choice(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      
      return view('admin.shop.choice');
    }
    
    public function yes(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      // Image Modelからデータを取得する
      $images = Image::all();
      // Image Modelからデータを取得する
      $checkboxes = Checkbox::all();
      
      //消去する
      $user->delete();
      $images->delete();
      $checkboxes->delete();
      
      return redirect('auth/login');
    }
    
    public function create()
    {
      return view('admin.shop.create');
    }
    
}
