{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'アカウント'を埋め込む --}}
@section('title', 'アカウント')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アカウント</h2>
                <div class="btn-group">
                    <form action="{{ action('Admin\ShopController@edit') }}" method="get">
                        <input type="submit" class="btn btn-edit" value="変更">
                    </form>
                	<form action="{{ action('Admin\ShopController@choice') }}" method="get">
                	    <input type="submit" class="btn btn-delete" value="アカウントの消去">
                	</form>
                </div>
            </div>
        </div>
    </div>
    
@endsection