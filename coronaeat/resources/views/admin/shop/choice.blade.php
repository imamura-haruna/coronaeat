{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'アカウント消去'を埋め込む --}}
@section('title', 'アカウント消去')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アカウント消去</h2>
                <div class="btn-group">
                    <form action="{{ action('Admin\ShopController@login') }}" method="post">
                        <input type="button" class="btn btn-yes" value="アカウントを消去する">
                    </form>
                    <form action="{{ action('Admin\ShopController@show') }}" method="get">
                        <input type="button" class="btn btn-no" value="ショップページへ戻る">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection