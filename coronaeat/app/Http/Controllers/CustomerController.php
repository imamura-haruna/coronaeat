<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 以下各Modelが扱えるようになる
use App\User;
use App\Image;
use App\Checkbox;
use App\Question;
use App\ShopImage;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search != '') {
          // 検索されたら検索結果を取得する
          $users = User::where('name', $search)->get();
        } else {
          // それ以外はすべてのニュースを取得する
          $users = User::all()->sortByDesc('updated_at');
        }
        
       
       return view('customer.index', ['users' => $users, 'search' => $search]);
    }
    
    public function show(Request $request)
    {
      $user = User::find($request->id);
      //上と同じ書き方$user = User::where('id', $request->id)->first();
      //dd([$user->question]);
      //$questions = Question::where('user_id', $user->id);
      //$images = ShopImage::find($request->user_id);
       
       return view('customer.shop', ['user' => $user/*, 'questions' => $questions, 'images' => $images*/]);
    }
    
    /*public function index(Request $request)
    {
        $keyword_name = $request->name;
        $keyword_free = $request->free;
        $keyword_location = $request->location;
        
    
        if($keyword_name != "" && empty($keyword_free) && empty($keyword_location)) {
          // 検索されたら検索結果を取得する
          $users = User::where('name', $keyword_name)->get();
          $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
          
          return view('/serch')->with(['users' => $users,'message' => $message,]);
        }
    
        elseif(empty($keyword_name) && !empty($keyword_free) && empty($keyword_location)){
          $query = User::query();
          $users = $query->all('name','comment','like', '%' .$keyword_free. '%')->get();
          $message = "「". $keyword_free."」を含む検索が完了しました。";
          
          return view('/serch')->with(['users' => $users,'message' => $message,]);
        }
        elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
          $query = User::query();
          $users = $query->where('age','>=', $keyword_age)->get();
          $message = $keyword_age. "歳以上の検索が完了しました";
          return view('/serch')->with([
            'users' => $users,
            'message' => $message,
          ]);
        }
        else{
            // それ以外はすべてのニュースを取得する
            $users = User::all();
        }*/
        
      
          
        /*$questions = Question::all('question1','question2','question3','question4','question5','question6','question7','question8','question9','question10');
        if(isset($questions['question1'])){
          echo 3;
        }
        
        //dd($count); 
       
      return view('customer.index', ['users' => $users , 'search' => $search]);
    }*/
}
