<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下各Modelが扱えるようになる
use App\User;
use App\Image;
use App\Checkbox;
use App\Question;
use App\ShopImage;
//edit アクションで使用
use Auth;

class ShopController extends Controller
{
    public function show(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      $questions = Question::where('user_id', $user->id)->first();
      //dd($questions);
      // get()を使用する場合の、ユーザー内データの取得。しかしviewで@if(Auth::user()->データを入れる変数名 != null
      //$images = Image::where('id',$user->id)->get();
      //$questions = Question::where('id',$user->id)->get();
      //findでは配列を取得。
      //$checkboxes = Checkbox::find($user->id);
      
      return view('admin.shop.information',[/*'images'=>$images,*/'questions'=>$questions]);
    }
    
    public function image(Request $request)
    {
      $user = Auth::user();
      return view('admin.shop.image');
    }
    
    public function createimage(Request $request)
    {
      //Varidationを行う
      // $this->validate($request, ShopImages::$rules);
      $image = new ShopImage;
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
      
      $image->save($form);
      // $images = ShopImages::all();
      // $questions = question::all();
      
      //$checkboxes = Checkbox::all();
      //post時はredirect
      return redirect('admin/shop/information');
      // 'checkboxes'=>$checkboxes
      //'images'=>$images,['shopimages'=>$images,'questions'=>$questions]
    }
    
    public function updateimage(Request $request)
    {
      $user = Auth::user();
      $image_form = ShopImage::find($request->id);
      //dd($image_form);
      $form = $request->all();
      
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $image_form->image = basename($path);
      }
      
      //$image_form->image=$request->image;
      //dd();
      $image_form->title=$request->title;
      //dd($image_form);
      /*if($image_form['title'] != null){
        $image_form->title = $request->title;
      }
      if($image_form['image'] != null){
        $image_form->image = $request->image;
        /*$path = $request->file('image')->store('public/image');
        $image_form->image = basename($path);
      }*/
      unset($form['_token']);
      unset($form['image']);
      
      $image_form->update();
      
      //$user = User::find($user->id);
      //viewからnameを受け取り、'配列'に入れて保存。
      /*$image = ShopImages::find($user->id);
      $image_form = $request->all();
      unset($image_form['_token']);
      */
      //$user->fill($user_form);
      //if($user_form['']!=null)は後付け
      /*if($image_form['title'] != null){
        $image->title = $image_form['title'];
      }
      if($image_form['image'] != null){
        $image->image = $image_form['image'];
      }*/
      //dd($user);
      /*fill(['bussiness_hours' => $request['bussiness_hours'],
      'location' => $request['location'],
      'phone_number' => $request['phone_number'],
      'url' => $request['url'],
      'comment' => $request['comment']
      ]);*/
      //dd(isset($question['question1']));
      //'question10' => $request->question10ではnullが入る
      //$userのプロパティにフォームから送られてきた情報を渡す
      // 該当するデータを上書きして保存する
      //$user->update(); //更新
      //post時はredirect
      return redirect('admin/shop/image');
    }
    
    public function deleteimage(Request $request)
    {
      $user = Auth::user();
      //$image_form = ShopImage::where('user_id', $user->id)->first();
      //$image_forms = ShopImage::where('user_id',$user->id);
      //$image_form = ShopImage::get('id',$image_forms->id);
      $image_form = ShopImage::find($request->id);
      //dd($image_form);
      $image_form->delete();
      //$form = $request->all();
      //$image_form = ShopImages::find($user->id);
      //$image_form = $request->all(['image']);
      //$image_form = $request->all();
      
      // 削除する
      
      
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
      $questions = Question::where('user_id', $user->id)->first();
      //dd($images);
      return view('admin.shop.edit',['user'=>$user/*,'images'=>$images*/,'questions'=>$questions]);
    }
    
    public function update(Request $request)
    {
      
      //Userについて
      //ユーザー登録時にデフォルト値を入れているから、新規作成はしなくていい
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      //$user = User::find($user->id);
      //viewからnameを受け取り、'配列'に入れて保存。
      
      $user_form = $request->all();
      unset($user_form['_token']);
      
      //$user->fill($user_form);
      //if($user_form['']!=null)は後付け
      if($user_form['bussiness_hours'] != null){
        $user->bussiness_hours = $user_form['bussiness_hours'];
      }
      if($user_form['location'] != null){
        $user->location = $user_form['location'];
      }
      if($user_form['phone_number'] != null){
        $user->phone_number = $user_form['phone_number'];
      }
      if($user_form['url'] != null){
        $user->url = $user_form['url'];
      }
      if($user_form['comment'] != null){
        $user->comment = $user_form['comment'];
      }
      //dd($user);
      /*fill(['bussiness_hours' => $request['bussiness_hours'],
      'location' => $request['location'],
      'phone_number' => $request['phone_number'],
      'url' => $request['url'],
      'comment' => $request['comment']
      ]);*/
      //dd(isset($question['question1']));
      //'question10' => $request->question10ではnullが入る
      //$userのプロパティにフォームから送られてきた情報を渡す
      // 該当するデータを上書きして保存する
      $user->update(); //更新
      
      
      $questions = Question::where('user_id', $user->id)->first();
      
      if (!isset($questions)) {
        $questions = new Question;
        $questions->user_id = $user->id;
      }
      //'question10' => $request->question10ではnullが入る
      //viewからtrueを受け取り、'配列'に入れて保存。
      $questions->
      fill(['question1' => isset($request['question1']),
      'question2' => isset($request['question2']),
      'question3' => isset($request['question3']),
      'question4' => isset($request['question4']),
      'question5' => isset($request['question5']),
      'question6' => isset($request['question6']),
      'question7' => isset($request['question7']),
      'question8' => isset($request['question8']),
      'question9' => isset($request['question9']),
      'question10' => isset($request['question10'])
      ]);
      //dd($questions['question1']);
      
      $questions->save();
      //dd($questions);
      /*foreach($questions as $question)
      if($question == "true"){
        $question->checked;
      }*/
      
      /*$image_form = ShopImage::find($request->id);
      
      //$image_form->title=$request->title;
      if($image_form['title'] != null){
        $image_form->title = $request->title;
      }
      if($image_form['image'] != null){
        $image_form->image = $request->image;
        $path = $request->file('image')->store('public/image');
        $image_form->image = basename($path);
      }
      unset($image_form['_token']);
      //dd($image_form);
      $image_form->update();*/
      /*
      // News Modelからisset($question['question9'])
      $images = ShopImage::isset($question['question10'])
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
      $images->fill($image)->save();*/
        
      return redirect('admin/shop/edit'/*,['shop_image'=>$images,'questions'=>$questions]*/);
    }
    
    public function choice(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      
      return view('admin.shop.choice');
    }
    
    public function delete(Request $request)
    {
      // 特定ユーザーの情報を取得（既ログイン者）
      $user = Auth::user();
      //消去する
      $user->delete();
      
      return redirect('/login');
    }
    
    public function create()
    {
      return view('admin.shop.create');
    }
    
    
}
