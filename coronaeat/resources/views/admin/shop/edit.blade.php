{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ショップ編集を埋め込む --}}
@section('title', 'ショップ編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タイトル</h2>
            </div>
        </div>
    </div>
    <div class="btn-group">
    	<input type="submit" class="btn btn-delete" value="消去">
    	<input type="submit" class="btn btn-registration" value="登録">
	</div>
@endsection