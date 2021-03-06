{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ショップ編集を埋め込む --}}
@section('title', 'ショップ編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p>
                  <div style="margin-bottom:30px"></div>
                </p>
            </div>
            <div class="col-md-8 mx-auto">
                <div class="body">
                    <div class="col-md-12 mx-auto row bg-info text-white">
                        <p>
                          <div style="margin-bottom:30px"></div>
                        </p>
                    </div>
                    <div class="col-md-12 mx-auto row bg-info text-white">
                        <hr color="#c0c0c0">
                            <h2>
                                設定内容の編集
                            </h2>
                        <hr color="#c0c0c0">
                    </div>
                    <div class="col-md-12 mx-auto row bg-info text-white">
                        <p>
                          <div style="margin-bottom:20px"></div>
                        </p>
                    </div>
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:40px"></div>
                        </p>
                    </div>
                    <div class="col-md-12 mx-auto row">
                        <div class="form-group col-md-12 mx-auto row">
                            <h3>店名：　{{ $user->name }}</h3>
                        </div>
                    </div>
                    <form action="{{ action('Admin\ShopController@update') }}" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 mx-auto row">
                            <div class="form-group col-md-12 mx-auto row">
                                <p>
                                  <div style="margin-bottom:10px"></div>
                                </p>
                            </div>
                            <div class="form-group col-md-12 mx-auto row">
                                <label for="location">アクセス</label>
                                <div class="col-md-8"></div>
                                <div class="col-md-8">
                                    <input type="text" class="col-md-4 form-control" value="{{ $user->location }}" name="location" placeholder="000-0000">
                                </div>
                                
                                <div class="col-md-8">
                                    <select type="text" class="col-md-4 form-control dropdown" value="{{ $user->location2 }}" name="location2" autocomplete="address-level1">
                                        <option value="" selected>都道府県</option>
                                        <option value="北海道">北海道</option>
                                        <option value="青森県">青森県</option>
                                        <option value="岩手県">岩手県</option>
                                        <option value="宮城県">宮城県</option>
                                        <option value="秋田県">秋田県</option>
                                        <option value="山形県">山形県</option>
                                        <option value="福島県">福島県</option>
                                        <option value="茨城県">茨城県</option>
                                        <option value="栃木県">栃木県</option>
                                        <option value="群馬県">群馬県</option>
                                        <option value="埼玉県">埼玉県</option>
                                        <option value="千葉県">千葉県</option>
                                        <option value="東京都">東京都</option>
                                        <option value="神奈川県">神奈川県</option>
                                        <option value="新潟県">新潟県</option>
                                        <option value="富山県">富山県</option>
                                        <option value="石川県">石川県</option>
                                        <option value="福井県">福井県</option>
                                        <option value="山梨県">山梨県</option>
                                        <option value="長野県">長野県</option>
                                        <option value="岐阜県">岐阜県</option>
                                        <option value="静岡県">静岡県</option>
                                        <option value="愛知県">愛知県</option>
                                        <option value="三重県">三重県</option>
                                        <option value="滋賀県">滋賀県</option>
                                        <option value="京都府">京都府</option>
                                        <option value="大阪府">大阪府</option>
                                        <option value="兵庫県">兵庫県</option>
                                        <option value="奈良県">奈良県</option>
                                        <option value="和歌山県">和歌山県</option>
                                        <option value="鳥取県">鳥取県</option>
                                        <option value="島根県">島根県</option>
                                        <option value="岡山県">岡山県</option>
                                        <option value="広島県">広島県</option>
                                        <option value="山口県">山口県</option>
                                        <option value="徳島県">徳島県</option>
                                        <option value="香川県">香川県</option>
                                        <option value="愛媛県">愛媛県</option>
                                        <option value="高知県">高知県</option>
                                        <option value="福岡県">福岡県</option>
                                        <option value="佐賀県">佐賀県</option>
                                        <option value="長崎県">長崎県</option>
                                        <option value="熊本県">熊本県</option>
                                        <option value="大分県">大分県</option>
                                        <option value="宮崎県">宮崎県</option>
                                        <option value="鹿児島県">鹿児島県</option>
                                        <option value="沖縄県">沖縄県</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-12 mx-auto row">
                                    <input type="text" class="form-control" value="{{ $user->location3 }}" name="location3" placeholder="市区町村名">
                                </div>
                                
                            </div>
                            <div class="form-group col-md-12 mx-auto row">
                                <label for="phone_number">電話番号</label>
                                <input type="tel" class="form-control" value="{{ $user->phone_number }}" name="phone_number">
                            </div>
                            <div class="form-group col-md-12 mx-auto row">
                                <label for="inputbussiness_hours">営業時間</label>
                                <input type="text" class="form-control" value="{{ $user->bussiness_hours }}" name="bussiness_hours" placeholder="ex) 【ランチ】10:00~14:00　【ディナー】18:00~:23:00" >
                            </div>
                            <div class="form-group col-md-12 mx-auto row">
                                <label for="url">ホームページURL</label>
                                <input type="url" class="form-control" value="{{ $user->url }}" name="url">
                            </div>
                            <div class="form-group col-md-12 mx-auto row">
                                <label for="comment">お客様へのメッセージ</label>
                                <textarea class="form-control"　rows="3" name="comment" placeholder="ex) コロナ対策、従業員の体調管理を徹底しております。安心してご利用ください。">{{ $user->comment }}</textarea>
                            </div>
                            <div class="col-md-12 mx-auto row">
                                <p>
                                  <div style="margin-bottom:100px"></div>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 mx-auto row">
                            <div class="custom-checkbox col-md-12 mx-auto row">
                                <h4>衛生チェック</h4><p>（当てはまる項目にチェックを入れてください）</p>
                            </div>
                            <div class="col-md-11 mx-auto row">
                                <p>
                                  <div style="margin-bottom:30px"></div>
                                </p>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <!--<label> を <input> 要素に関連付けるには、 <input> に id 属性を設定しなければなりません。そして <label> に for 属性を設定して、値を input の id と同じにします。-->
                                {{-- ->名称 のようにアロー演算子を利用してアクセスするのはオブジェクトのプロパティ。all()メソッドはオブジェクトを配列として返す為valueは[]このようになる --}}
                                <input type="checkbox" class="custom-control-input" id="customCheck1" value="true" name="question1" {{ empty($questions->question1) == "0" ? 'checked="checked"' : ''  }}>
                                <label class="custom-control-label" for="customCheck1">店内は、厚生労働省推奨の換気・保湿を実施しています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" value="true" name="question2" {{ empty($questions->question2) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck2">カウンター席は、パーテーションを設置しています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck3" value="true" name="question3" {{ empty($questions->question3) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck3">テーブル席は、パーテーションを設置しています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck4" value="true" name="question4" {{ empty($questions->question4) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck4">使用後の座席は、アルコール消毒をしています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck5" value="true" name="question5" {{ empty($questions->question5) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck5">使用後のテーブルは、アルコール消毒をしています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck6" value="true" name="question6" {{ empty($questions->question6) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck6">従業員は、出勤・退勤時のアルコール消毒をしています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck7" value="true" name="question7" {{ empty($questions->question7) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck7">従業員は勤務中、マスクを着用しています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck8" value="true" name="question8" {{ empty($questions->question8) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck8">従業員の体温・体調管理を徹底しています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck9" value="true" name="question9" {{ empty($questions->question9) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck">お客様に、入口にて検温のご協力をお願いしています</label>
                            </div>
                            <div class="custom-checkbox col-md-11 mx-auto row">
                                <input type="checkbox" class="custom-control-input" id="customCheck10" value="true" name="question10" {{ empty($questions->question10) == "0"? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="customCheck10">お客様に、入店・退店時のアルコール消毒にご協力をお願いしています</label>
                            </div>
                            <div class="col-md-12 mx-auto row">
                                <p>
                                  <div style="margin-bottom:150px"></div>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 mx-auto row">
                            <div class="btn-group mx-auto">
                                <div class="button-area">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-update" value="編集内容を保存">
                                </div>
                                <div class="button-area">
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="button-area">
                                    <a href="{{ action('Admin\ShopController@show') }}" role="button" class="btn">アカウントページへ</a>
                                </div>
                            </div>
                        </div>
                        {{--@php
                            dd($user);
                        @endphp--}}
                        <div class="col-md-12 mx-auto row">
                            <p>
                              <div style="margin-bottom:50px"></div>
                            </p>
                        </div>
                    </form>
                    <div class="col-md-12 mx-auto row">
                        <div class="col-md-12 mx-auto row">
                            <p>
                              <div style="margin-bottom:500px"></div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="form-group col-md-12 mx-auto row">
        <label for="inputEmail" class="col-form-label">Email</label>
        <input type="email" class="form-control" value="{{ $user->email }}" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-12 mx-auto row">
        <label for="inputPassword" class="col-form-label">Password</label>
        <input type="Password" class="form-control" value="{{ $user->password }}" name="password" placeholder="Password">
    </div>--}}
        
    
@endsection