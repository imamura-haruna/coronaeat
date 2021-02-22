<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopImage extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        //'required'は'入力必須'というバリテーション
        //viewからControllerに渡す内容
        //'user_id' => 'required',
        'title' => 'required',
        'image' => 'required',
    );
}
