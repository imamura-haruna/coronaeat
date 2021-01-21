{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ショップ編集を埋め込む --}}
@section('title', 'ショップ編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ショップ編集</h2>
                <div class="btn-group">
                    <form action="{{ action('Admin\ShopController@delete') }}" method="post">
                       <input type="submit" class="btn btn-delete" value="消去"> 
                    </form>
                    <form action="{{ action('Admin\ShopController@add') }}" method="post">
                        <input type="submit" class="btn btn-registration" value="登録">
                    </form>
            	</div>
            </div>
        </div>
    </div>
    
@endsection