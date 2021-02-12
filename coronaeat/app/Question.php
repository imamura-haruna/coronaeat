<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        //'required'は'入力必須'というバリテーション
        //'user_id' => 'required',
        'question1' => 'required',
        'question2' => 'required',
        'question3' => 'required',
        'question4' => 'required',
        'question5' => 'required',
        'question6' => 'required',
        'question7' => 'required',
        'question8' => 'required',
        'question9' => 'required',
        'question10' => 'required',
    );
}
