<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下各Modelが扱えるようになる
use App\User;
use App\Image;
use App\Checkbox;
use App\Question;
use App\ShopImages;
//edit アクションで使用
use Auth;

class ShopController extends Controller
{
    public function show(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      // get()を使用する場合の、ユーザー内データの取得。しかしviewで@if(Auth::user()->データを入れる変数名 != null
      //$images = Image::where('id',$user->id)->get();
      //$questions = Question::where('id',$user->id)->get();
      //findでは配列を取得。
      //$checkboxes = Checkbox::find($user->id);
      
      return view('admin.shop.information'/*,['images'=>$images,'questions'=>$questions]*/);
    }
    
    public function createimage(Request $request)
    {
      //Varidationを行う
      // $this->validate($request, ShopImages::$rules);
      $image = new ShopImages;
      $form = $request->all();
      //dd($request);
      
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $image->image = basename($path);
      } else {
          $image->image = null;
      }
      $image->user_id = Auth::id();
      
      //フォームから送信されてきた_tokenを消去する
      unset($form['_token']);
      //フォームから送信されてきたimageを消去する
      unset($form['image']);
      
      //データベースに保存する
      $image->fill($form);
      // dd($image,$form);
      $image->save();
      
      // $images = ShopImages::all();
      // $questions = question::all();
      
      //$checkboxes = Checkbox::all();
      //post時はredirect
      return redirect('admin/shop/information');
      // 'checkboxes'=>$checkboxes
      //'images'=>$images,['shopimages'=>$images,'questions'=>$questions]
    }
    
    public function delete(Request $request)
    {
      $image = ShopImages::where('id');
      // 削除する
      dd($image);
      $image->delete();
      
      return redirect('admin/shop/information');
    }
    
    public function edit(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      //$questions = Question::where('id',$user->id)->get();
      //$images = ShopImages::find($request->id);
      //$images=Image::all();
      // $checkboxes=Checkbox::find($request->id);
      $questions = Question::find($request->id);
      //dd($images);
      return view('admin.shop.edit',['user'=>$user/*,'images'=>$images*/,'question'=>$questions]);
    }
    
    public function update(Request $request)
    {
      //Userについて
      //ユーザー登録時にデフォルト値を入れているから、新規作成はしなくていい
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      //$userのプロパティにフォームから送られてきた情報を渡す
      $user->update(); //更新
      
      //Checkboxについて
      // 該当しない項目があるためValidationをかけない
      //$this->validate($request, question::$rules);
      // question Modelからデータを取得する
      $questions = Question::where('id',$user->id)->get();
      //$questions = Question::find($user->id);
      // 送信されてきたフォームデータを格納する
      $question = $request->all();
      unset($question['_token']);
      // 該当するデータを上書きして保存する
      $question->fill($question);
      $question->save();
      
      /*$checkboxes = Checkbox::find($request->id);
      $checkbox = $request->all();
      unset($checkbox['_token']);
      $checkboxes->fill($checkbox);
      $checkboxes->save();*/
      
      // Validationをかける
      $this->validate($request, Image::$rules);
      // News Modelからデータを取得する
      $images = ShopImages::find($request->id);
      $image = $request->all();
      // 送信されてきたフォームデータを格納する
      if ($request->remove == 'true') {
          $image['image'] = null;
      } elseif ($request->file('shop_image')) {
          $path = $request->file('shop_image')->store('public/image');
          $image['image'] = basename($path);
      } else {
          $image['image'] = $images->image;
      }
      
      unset($image['shop_image']);
      unset($image['remove']);
      unset($image['_token']);
      // 該当するデータを上書きして保存する
      $images->fill($image)->save();
        
      return redirect('admin/shop/edit',['shop_image'=>$images,'questions'=>$questions]);
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
