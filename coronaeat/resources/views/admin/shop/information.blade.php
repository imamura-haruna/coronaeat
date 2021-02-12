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
                    <h2>アカウント</h2>
                </div>
                <div class="user">
                    <div class="form-group col-md-12 mx-auto row">
                        <table class="table-borderless">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                       {{ Auth::user()->name }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ Auth::user()->bussiness_hours }}</td>
                                    <td>{{ Auth::user()->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td scope="row"　colspan="2">{{ Auth::user()->location }}</td>
                                </tr>
                                <tr>
                                    <td scope="row"　colspan="2">{{ Auth::user()->url }}</td>
                                </tr>
                            </tbody>
                        </table>
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
                    <h5>衛生チェック</h5><p>（  <button type="button" class="btn btn-warning btn-sm">設定内容の変更</button>  から変更してください）</p>
                    <div class="form-group col-md-12 mx-auto row">
                        <table class="table table-borderless">
                            <tbody>
                                <!--ユーザー内でのquestionを取得する-->
                                @if(Auth::user()->questions != null)
                                @foreach($questions as $question)
                                <tr>
                                    <th>{{ $question->question1 }}</th>
                                    <td>店内は、厚生労働省推奨の換気・保湿を実施しています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question2 }}</th>
                                    <td>カウンター席は、パーテーションを設置しています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question3 }}</th>
                                    <td>テーブル席は、パーテーションを設置しています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question4 }}</th>
                                    <td>使用後の座席は、アルコール消毒をしています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question5 }}</th>
                                    <td>使用後のテーブルは、アルコール消毒をしています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question6 }}</th>
                                    <td>従業員は、出勤・退勤時のアルコール消毒をしています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question7 }}</th>
                                    <td>従業員は勤務中、マスクを着用しています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question8 }}</th>
                                    <td>従業員の体温・体調管理を徹底しています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question9 }}</th>
                                    <td>お客様に、入口にて検温のご協力をお願いしています</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $question->question10 }}</th>
                                    <td>お客様に、入店・退店時のアルコール消毒にご協力をお願いしています</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
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
                    <form action="{{ action('Admin\ShopController@createimage')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-12 mx-auto row">
                            <div class="images border" style="padding:10px;">
                                <div class="col-md-12">
                                    <label for="title">新規作成</label>
                                    <input type="text" class="form-control" name="title" placeholder="ex)店内入口：アルコール除菌液">
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
                    <!--ユーザー内でのimageを取得する-->
                    <!--User.php内のpublicfunctionから各migrationファイル内->この場合ShopImages.phpファイル内、のclassにつながっている-->
                    @if(Auth::user()->shopimages != null)
                    @foreach(Auth::user()->shopimages as $shopimage)
                        <div class="col-md-8 mx-auto row">
                            <div class="images" style="padding:10px;">
                                <!--<form action="{{ action('Admin\ShopController@delete')}}" method="post">-->
                                    <div class="card" name="form">
                                        <img class="card-img-top" src="{{ asset('storage/image/' . $shopimage->image) }}" alt="店内画像">
                                        <div class="card-body">{{ $shopimage->title }}</div>
                                    </div>
                                    <!--{{ csrf_field() }}-->
                                    <!--<input type="submit" class="btn btn-sm" value="消去">-->
                                <!--</form>-->
                                <!--<a href="{{ action('Admin\ShopController@delete') }}">
                                    <input type="submit" class="btn btn-sm" value="消去"> 
                                </a>-->
                            </div>
                        </div>
                    @endforeach
                    @endif
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
                    <div class="col-md-2"></div>
                    <form action="{{ action('Admin\ShopController@edit') }}" method="get">
                        <input type="submit" class="btn btn-edit" value="設定内容の変更">
                    </form>
                    <div class="col-md-2">
                        
                    </div>
                	<form action="{{ action('Admin\ShopController@choice') }}" method="get">
                	    <input type="submit" class="btn btn-delete" value="アカウントの消去">
                	</form>
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