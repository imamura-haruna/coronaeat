<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        //'required'は'入力必須'というバリテーション
        //'user_id' => 'required',
        'checkbox1' => 'required',
        'checkbox2' => 'required',
        'checkbox3' => 'required',
        'checkbox4' => 'required',
        'checkbox5' => 'required',
        'checkbox6' => 'required',
        'checkbox7' => 'required',
        'checkbox8' => 'required',
        'checkbox9' => 'required',
        'checkbox10' => 'required',
    );
}
