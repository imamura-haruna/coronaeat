{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'アカウント消去'を埋め込む --}}
@section('title', 'アカウント消去')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto row">
                <p>
                  <div style="margin-bottom:50px"></div>
                </p>
            </div>
            <div class="col-md-12 mx-auto">
                <div class="col-md-2 mx-auto">
                        
                </div>
                <div class="col-md-8 mx-auto">
                    <div class="card" style="padding:20px;">
                        <div class="card-body">
                            <p class="card-text">
                                アカウントを消去する場合は<span class="badge badge-primary">delete</span>のボタンを
                                <br>押してください。
                            </p>
                            <div class="btn-group">
                                <a href="{{ action('Admin\ShopController@delete') }}" method="get">
                                    <input type="button" class="btn btn-primary" value="delete">
                                </a>
                                <!--<form action="{{ action('Admin\ShopController@delete') }}" method="post">
                                    <input type="button" class="btn btn-primary" value="はい">
                                </form>-->
                                <div class="col-md-2">
                            
                                </div>
                                <a href="{{ action('Admin\ShopController@show') }}" method="get">
                                    <input type="button" class="btn btn-primary" value="ショップページへ戻る">
                                </a>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-md-2 mx-auto">
                        
                </div>
            </div>
            <div class="col-md-12 mx-auto row">
                <p>
                  <div style="margin-bottom:500px"></div>
                </p>
            </div>
        </div>
    </div>
    
@endsection