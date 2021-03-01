{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'アカウント'を埋め込む --}}
@section('title', 'アカウント')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:100px"></div>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <h2>アカウント</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:50px"></div>
                        </p>
                    </div>
                </div>
                <div class="user">
                    <div class="form-group col-md-12 mx-auto row">
                        <div class="form-group col-md-12 mx-auto row">
                            <h4>
                                {{ Auth::user()->name }}
                            </h4>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">営業時間：　</label>
                            <p>
                                {{ Auth::user()->bussiness_hours }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">TEL：　</label>
                            <p>
                                {{ Auth::user()->phone_number }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">住所：　</label>
                            <p>
                                {{ Auth::user()->location }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">URL：　</label>
                            <p>
                                {{ Auth::user()->url }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <div class="alert alert-info col-md-10" role="alert">
                                <strong>コメント</strong><br>{{ Auth::user()->comment }}
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:50px"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <h5>衛生チェック</h5><p>（  <a href="{{ action('Admin\ShopController@edit') }}" role="button" class="btn btn-sm">設定内容の変更</a><!--<button type="button" class="btn btn-sm">設定内容の変更</button>-->  から変更してください）</p>
                    <div class="form-group col-md-12 mx-auto row">
                        
                        {{--@if(Auth::user()->questions != null)--}}
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question1) == "0"? 'checked="checked"' : '' }} disabled>　店内は、厚生労働省推奨の換気・保湿を実施しています
                        </div>
                        {{--@php
                            dd($questions);
                        @endphp--}}
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question2) == "0"? 'checked="checked"' : '' }} disabled>　カウンター席は、パーテーションを設置しています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question3) == "0"? 'checked="checked"' : '' }} disabled>　テーブル席は、パーテーションを設置しています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question4) == "0"? 'checked="checked"' : '' }} disabled>　使用後の座席は、アルコール消毒をしています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question5) == "0"? 'checked="checked"' : '' }} disabled>　使用後のテーブルは、アルコール消毒をしています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question6) == "0"? 'checked="checked"' : '' }} disabled>　従業員は、出勤・退勤時のアルコール消毒をしています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question7) == "0"? 'checked="checked"' : '' }} disabled>　従業員は勤務中、マスクを着用しています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question8) == "0"? 'checked="checked"' : '' }} disabled>　従業員の体温・体調管理を徹底しています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question9) == "0"? 'checked="checked"' : '' }} disabled>　お客様に、入口にて検温のご協力をお願いしています
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($questions->question10) == "0"? 'checked="checked"' : '' }} disabled>　お客様に、入店・退店時のアルコール消毒にご協力をお願いしています
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="col-md-12 mx-auto row">
                    <p>
                      <div style="margin-bottom:50px"></div>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <h5>店舗画像</h5><p>（お客様に安心して来てもらえるように、たくさんの画像をアップロードしましょう）</p>
                    <form action="{{ action('Admin\ShopController@createimage')}}" method="post" enctype="multipart/form-data" class="col-md-12">
                        <div class="form-group col-md-8 mx-auto row">
                            <div class="images bordle border" style="padding:10px;">
                                <label>新規作成</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="title" placeholder="ex)入口：アルコール除菌液">
                                </div>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                                <div class="col-md-12">
                                    <p>
                                        <div style="margin-bottom:10px"></div>
                                    </p>
                                </div>
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-sm" value="追加する">
                                </div>
                            </div>  
                        </div>
                    </form>
                    <div class="form-group col-md-8 mx-auto row">
                        <p>
                          <div style="margin-bottom:50px"></div>
                        </p>
                    </div>
                    <div class="form-group col-md-8 mx-auto row">
                        <div class="form-group">
                            <div class="border" style="padding:10px;">
                                @if(Auth::user()->shopimages != null)
                                @foreach(Auth::user()->shopimages as $image)
                                <div class="card col-md-11">
                                    @if ($image->image)
                                        {{-- DBでは画像をパスでしか保存ができない。なので画像が格納されている場所をURLにして表示する --}}
                                        <img class="card-img-top img-thumbnail" src="{{ asset('storage/image/' . $image->image) }}" alt="Card image cap">
                                    @endif
                                    <!--<input type="file" class="form-control-file" name="shop_image">-->
                                    <div class="card-body row" style="background-color: #fff;">
                                        <p class="card-text">{{ $image->title }}</p>
                                    </div>
                                    
                                    <div class="button-area" style="text-align: center; background-color: #fff;">
                                        <a href="{{ action('Admin\ShopController@image') }}" role="button" class="btn btn-sm">画像の編集</a>
                                        <a href="{{ action('Admin\ShopController@deleteimage', ['id' => $image->id]) }}" role="button" class="btn btn-sm">消去</a>
                                    </div>
                                    <div class="row" style="background-color: #fff;">
                                        <p>
                                            <div style="margin-bottom:10px"></div>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 mx-auto row">
                                    <p>
                                      <div style="margin-bottom:50px"></div>
                                    </p>
                                </div>
                                @endforeach
                                @endif
                            </div>   
                        </div>  
                    </div>
                </div>
                <div class="col-md-12 mx-auto row">
                    <p>
                      <div style="margin-bottom:200px"></div>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="btn-group">
                    <div class="col-md-2">
                        
                    </div>
                    <form action="{{ action('Admin\ShopController@edit') }}" method="get">
                        <input type="submit" class="btn btn-edit" value="設定内容の変更">
                    </form>
                    <div class="col-md-2">
                        
                    </div>
                	<form action="{{ action('Admin\ShopController@choice') }}" method="get">
                	    <input type="submit" class="btn btn-delete" value="アカウントの消去">
                	</form>
                	<div class="col-md-2">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto row">
                <p>
                  <div style="margin-bottom:500px"></div>
                </p>
            </div>
        </div>
    </div>
    
@endsection