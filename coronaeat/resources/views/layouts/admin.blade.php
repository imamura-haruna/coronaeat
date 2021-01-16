<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        {{--  --}}
        {{-- windowsの基本ブラウザであるedgeに対応する --}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- スマートフォンで見たときなど、画面幅ごとに文字や画像の大きさを調整してくれる --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます。「/js/app.js」というパスを生成 --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    
    
    
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            {{-- ビューポート中以上で展開する,カラースキーム明るい背景,laravel--}}
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    {{-- ブランドにリンクを貼る --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- configフォルダのapp.phpの中にあるnameにアクセス --}}
                       {{ config('app.name', 'Laravel') }} 
                    </a>
                    
                    {{-- ボタン、折り畳み機能、#navbarSupportedContentの要素を開く、対象はnavbarSupportedContent、折りたたまれている、Toggle navigationラベル --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>  
                    </button>
                    {{-- 内容が折りたたまれボタンに合わせて開閉する、navbarSupportedContentというページ内リンク --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>