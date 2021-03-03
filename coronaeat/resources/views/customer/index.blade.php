@extends('layouts.front')

@section('content')
    {{-- <div class="container">
        <div class="row">
            <hr color="#c0c0c0">
            <div class="col-sm-4">
                <h4>検索条件を入力してください</h4>
                <form action="{{ action('Customer\CustomerController@search') }}" method="post">
                    {{ csrf_field()}}
                    {{method_field('get')}}
                    
                    <div class="form-group">
                        <label>フリーワード</label>
                        <input type="text" class="form-control col-sm-8" placeholder="" name="free">
                    </div>
                    <div class="form-group">
                        <label>店名</label>
                        <input type="text" class="form-control col-sm-8" placeholder="店名を入力してください" name="name">
                    </div>
                    <div class="form-group pb-3">
                        <label>都道府県</label>
                        <select class="form-control col-sm-4" name="location">
                            <option selected value="">選択...</option>
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
                    <button type="submit" class="btn btn-primary col-md-5">検索</button>
                </form>
            </div>
            <hr color="#c0c0c0">
            <div class="col-md-8">
                <div class="row">
                    <div class="posts col-md-8 mx-auto mt-3">
                        @foreach($users as $user)
                            <div class="post">
                                <div class="row">
                                    <div class="text col-md-8">
                                        <div class="date">
                                            {{ $user->updated_at->format('Y年m月d日') }}
                                        </div>
                                        <div class="title">
                                            {{ str_limit($user->name, 30) }}
                                        </div>
                                        <div class="body mt-3">
                                            {{ str_limit($user->comment, 500) }}
                                        </div>
                                    </div>
                                            <div class="image col-md-6 text-right mt-4">
                                                @if ($post->image_path)
                                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                                @endif
                                            </div> 
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="col-md-12 mx-auto row bg-info text-white">
                <p>
                  <div style="margin-bottom:20px"></div>
                </p>
            </div>
            <div class="col-md-12 mx-auto row bg-info text-white">
                <hr color="#c0c0c0">
                <h3>CORONA-EAT</h3>
                <hr color="#c0c0c0">
            </div>
            <div class="col-md-12 mx-auto row bg-info text-white">
                <p>
                  <div style="margin-bottom:10px"></div>
                </p>
            </div>
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <form action="{{ action('CustomerController@index')}}" method="get">
                <form group="row">
                    <input type="text" name="search" value="{{ $search }}" placeholder=" 店名">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-sm btn-info text-white" value="search">
                </form>
            </form>
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="col-md-8  mx-auto pb-3">
                
            </div>
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($users as $user)
                    <div class="linkbox">
                        <div class="row">
                            <div class="text col-md-8 pb-4">
                                <div class="date mb-1 mt-3 text-secondary">
                                    {{ $user->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title text-info">
                                    <h3>{{ str_limit($user->name, 30) }}</h3>
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($user->comment, 500) }}
                                </div>
                            </div>
                            <a href="{{ action('CustomerController@show', ['id' => $user->id]) }}"></a>
                            {{-- <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div> --}}
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
            <div class="col-md-8  mx-auto pb-3">
                <p>
                  <div style="margin-bottom:500px"></div>
                </p>
            </div>
        </div>
    </div>
    </div>
@endsection