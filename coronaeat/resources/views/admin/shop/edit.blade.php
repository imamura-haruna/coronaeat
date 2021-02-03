{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ショップ編集を埋め込む --}}
@section('title', 'ショップ編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <h2>アカウント</h2>
                </div>
                    {{-- 送信するファイルのタイプ --}}
                <form action="{{ action('Admin\ShopController@add') }}" method="post" enctype="multipart/form-data">
                    <div class="user">
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="inputEmail" class="col-form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="inputPassword" class="col-form-label">Password</label>
                            <input type="Password" class="form-control" value="{{ $user->password }}" name="password" placeholder="Password">
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <label for="location">アクセス</label>
                            <div class="col-md-8"></div>
                            <input type="text" class="col-md-4 form-control" value="{{ $user->location }}" name="location" placeholder="000-0000">
                            <div class="col-md-8"></div>
                            <select type="text" class="col-md-4 form-control" value="{{ $user->location }}" name="location" autocomplete="address-level1">
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
                            <div class="col-md-4"></div>
                            <input type="text" class="form-control" value="{{ $user->location }}" name="location" placeholder="市区町村名">
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
                              <div style="margin-bottom:50px"></div>
                            </p>
                        </div>
                    </div>
                    <div class="checkboxes border" style="padding:30px;">
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <h5>衛生チェック</h5><p>（当てはまる項目にチェックを入れてください）</p>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            {{-- ->名称 のようにアロー演算子を利用してアクセスするのはオブジェクトのプロパティ。all()メソッドはオブジェクトを配列として返す為valueはこのようになる --}}
                            <input type="checkbox" class="custom-control-input" id="customCheck1" value="{{ $checkbox['checkbox1'] }}">
                            <label class="custom-control-label" for="customCheck1">店内は、厚生労働省推奨の換気・保湿を実施しています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" value="{{ $checkbox['checkbox2'] }}">
                            <label class="custom-control-label" for="customCheck2">カウンター席は、パーテーションを設置しています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck3" value="{{ $checkbox['checkbox3'] }}">
                            <label class="custom-control-label" for="customCheck3">テーブル席は、パーテーションを設置しています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck4" value="{{ $checkbox['checkbox4'] }}">
                            <label class="custom-control-label" for="customCheck4">使用後の座席は、アルコール消毒をしています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck5" value="{{ $checkbox['checkbox5'] }}">
                            <label class="custom-control-label" for="customCheck5">使用後のテーブルは、アルコール消毒をしています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck6" value="{{ $checkbox['checkbox6'] }}">
                            <label class="custom-control-label" for="customCheck6">従業員は、出勤・退勤時のアルコール消毒をしています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck7" value="{{ $checkbox['checkbox7'] }}">
                            <label class="custom-control-label" for="customCheck7">従業員は勤務中、マスクを着用しています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck8" value="{{ $checkbox['checkbox8'] }}">
                            <label class="custom-control-label" for="customCheck8">従業員の体温・体調管理を徹底しています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck9" value="{{ $checkbox['checkbox9'] }}">
                            <label class="custom-control-label" for="customCheck">お客様に、入口にて検温のご協力をお願いしています</label>
                        </div>
                        <div class="custom-checkbox col-md-11 mx-auto row">
                            <input type="checkbox" class="custom-control-input" id="customCheck10" value="{{ $checkbox['checkbox10'] }}">
                            <label class="custom-control-label" for="customCheck10">お客様に、入店・退店時のアルコール消毒にご協力をお願いしています</label>
                        </div>
                        <div class="col-md-12 mx-auto row">
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
                    <div class="images border" style="padding:30px;">
                        <div class="custom-checkbox col-md-12 mx-auto row">
                            <h5>店舗画像</h5><p>（お客様に安心して来てもらえるように、たくさんの画像をアップロードしましょう）</p>
                        </div>
                        <div class="form-group col-md-12 mx-auto row">
                            <div class="form-group">
                                <div class="border" style="padding:10px;">
                                    @foreach($images as $image)
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <label class="col-md-2" for="title">タイトル</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="title" value="{{ $news_form->title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2" for="image">画像</label>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control-file" name="image">
                                                <div class="form-text text-info">
                                                    設定中: {{ $news_form->image_path }}
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <input type="hidden" name="id" value="{{ $news_form->id }}">
                                                {{ csrf_field() }}
                                                <input type="submit" class="btn btn-primary" value="更新">
                                            </div>
                                        </div>
                                        @if ($image->shop_image)
                                            {{-- DBでは画像をパスでしか保存ができない。なので画像が格納されている場所をURLにして表示する --}}
                                            <img src="{{ asset('storage/image/' . $image->shop_image) }}">
                                        @endif
                                        <input type="file" class="form-control-file" name="image" src="{{ $image->shop_image }}">
                                        <p class="card-text">{{ $image->title }}</p>   
                                    </div>
                                    @endforeach 
                                </div>   
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:50px"></div>
                        </p>
                    </div>
                </form>
            </div>   
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="btn-group">
                    <form action="{{ action('Admin\ShopController@delete') }}" method="post">
                        <input type="submit" class="btn btn-delete" value="消去"> 
                    </form>
                    <div class="col-md-2">
                        
                    </div>
                    <form action="{{ action('Admin\ShopController@show') }}" method="get">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-add" value="登録">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 mx-auto row">
            <p>
              <div style="margin-bottom:500px"></div>
            </p>
        </div>
    </div>
    
@endsection