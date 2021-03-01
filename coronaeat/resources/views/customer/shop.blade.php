{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.front')

{{-- admin.blade.phpの@yield('title')に'アカウント'を埋め込む --}}
@section('title', 'Shop')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <div class="user">
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:100px"></div>
                        </p>
                    </div>
                    <div class="col-md-12 mx-auto row">
                        <div class="form-group col-md-12 mx-auto row">
                            <h2>
                                {{ $user->name }}
                            </h2>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">営業時間：　</label>
                            <p>
                                {{ $user->bussiness_hours }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">TEL：　</label>
                            <p>
                                {{ $user->phone_number }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">住所：　</label>
                            <p>
                                {{ $user->location }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">URL：　</label>
                            <p>
                                {{ $user->url }}
                            </p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <div class="alert alert-info col-md-10" role="alert">
                                <strong>コメント</strong><br>{{ $user->comment }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:100px"></div>
                        </p>
                    </div>
                </div>
                <div class="question">
                    <div class="col-md-12 mx-auto row">
                        <div class="form-group col-md-12 mx-auto row">
                            <h5>衛生チェック</h5>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <div class="alert alert-secondary" role="alert">
                                <strong>衛生チェックとは</strong>
                                <br>店舗側は、以下10項目の衛生対策にチェック式に記入しています。
                                <br>チェック数が多いほど対策をしていると思われるかもしれませんが、店の構造的にも違いが表れます。
                                <br>画像を見つつ、コロナ対策の確認を行ってください。
                            </div>
                        </div>
                        <div class="col-md-12 mx-auto row">
                            <p>
                              <div style="margin-bottom:20px"></div>
                            </p>
                        </div>
                        {{--@if(Auth::user()->questions != null)--}}
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question1) == "0"? 'checked="checked"' : '' }} disabled>　店内は、厚生労働省推奨の換気・保湿を実施しています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question2) == "0"? 'checked="checked"' : '' }} disabled>　カウンター席は、パーテーションを設置しています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question3) == "0"? 'checked="checked"' : '' }} disabled>　テーブル席は、パーテーションを設置しています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question4) == "0"? 'checked="checked"' : '' }} disabled>　使用後の座席は、アルコール消毒をしています
                        </div>
                        {{--@php
                            dd([$user->question]);
                        @endphp--}}
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question5) == "0"? 'checked="checked"' : '' }} disabled>　使用後のテーブルは、アルコール消毒をしています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question6) == "0"? 'checked="checked"' : '' }} disabled>　従業員は、出勤・退勤時のアルコール消毒をしています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question7) == "0"? 'checked="checked"' : '' }} disabled>　従業員は勤務中、マスクを着用しています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question8) == "0"? 'checked="checked"' : '' }} disabled>　従業員の体温・体調管理を徹底しています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question9) == "0"? 'checked="checked"' : '' }} disabled>　お客様に、入口にて検温のご協力をお願いしています
                        </div>
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <input type="checkbox" name="questions" {{ empty($user->question->question10) == "0"? 'checked="checked"' : '' }} disabled>　お客様に、入店・退店時のアルコール消毒にご協力をお願いしています
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <p>
                              <div style="margin-bottom:100px"></div>
                            </p> 
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="col-md-12 mx-auto row">
                        <div class="form-group col-md-12 mx-auto row">
                            <h5>コロナ対策画像</h5>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <div class="form-group row">
                                @if($user->shopimages != null)
                                @foreach($user->shopimages as $image)
                                <div class="card col-md-11">
                                    @if ($image->image)
                                        {{-- DBでは画像をパスでしか保存ができない。なので画像が格納されている場所をURLにして表示する --}}
                                        <img class="card-img-top img-thumbnail" src="{{ asset('storage/image/' . $image->image) }}" alt="Card image cap">
                                    @endif
                                    <!--<input type="file" class="form-control-file" name="shop_image">-->
                                    <div class="card-body row" style="background-color: #fff;">
                                        <p class="card-text">{{ $image->title }}</p>
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
                        <div class="form-group col-md-12 mx-auto row">
                            <p>
                              <div style="margin-bottom:100px"></div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="btn-group">
                    <div class="col-md-2">
                        
                    </div>
                    <form action="{{ action('CustomerController@index') }}" method="get">
                        <input type="submit" class="btn btn-secondary" value="トップページへ">
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