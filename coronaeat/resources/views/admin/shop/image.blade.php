{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に''を埋め込む --}}
@section('title', '画像')

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
                    <h2>Image</h2>
                    <div class="col-md-12 mx-auto row">
                        <p>
                          <div style="margin-bottom:10px"></div>
                        </p>
                    </div>
                    <div class="col-md-12 mx-auto row">
                        <div class="alert alert-secondary" role="alert">
                            <strong>投稿のポイント</strong>
                            <br>お店側のコロナ対策を知ることで、安心する人がたくさんいます。詳しい情報を提供しましょう。
                            <br>
                            <br>【画像】
                            <br>　　店内に配置している対象： 対象と、設置場所がわかるように撮影しましょう。
                            <br>　　従業員の行動・決まり事について： 張り紙等を作成し、写真を撮りましょう。
                            <br>【画像説明】
                            <br>　　分かりやすくシンプルな文体がおすすめです。紹介する項目は１項目ごとにしましょう。
                            <br>　　ex) 店内入口：アルコール除菌液
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
                    <div class="col-md-12 mx-auto row">
                        
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
                                    <form action="{{ action('Admin\ShopController@updateimage')}}" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <input type="text" class="form-control" name="title" placeholder="設定中：{{ $image->title }}" value="{{ $image->title }}">
                                        </div>
                                        <div class="form-group row" style="background-color: #fff;">
                                            <div class="col-md-2"></div>
                                            <input type="file" class="form-control-file" name="image">
                                        </div>
                                        <div class="btn group col-md-12">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $image->id }}">
                                            <input type="submit" class="btn btn-sm" value="更新">
                                        </div>
                                    </form>
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
                <div class="button-area">
                    <a href="{{ action('Admin\ShopController@show') }}" role="button" class="btn btn-primary">アカウントページへ</a>
                </div>
                <!--<form action="{{ action('Admin\ShopController@edit') }}" method="get">
                    <input type="submit" class="btn btn-edit" value="設定内容の変更">
                </form>
                <div class="col-md-2">
                    
                </div>
            	<form action="{{ action('Admin\ShopController@choice') }}" method="get">
            	    <input type="submit" class="btn btn-delete" value="アカウントの消去">
            	</form>
            	<div class="col-md-2">
                    
                </div>-->
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