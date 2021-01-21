<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        //'required'は'入力必須'というバリテーション
        'user_id' => 'required',
        'title' => 'required',
        'body' => 'required',
    );
}
