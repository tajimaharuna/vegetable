<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        
        <meta property="og:title" content="野菜の豆知識" />
        <meta property="og:image" content="何か画像" />
        <meta property="og:site_name" content="野菜の豆知識" />
        
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}"defer></script>
        
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" date-toggle="collapse" date-target="#navbarSupportedContent" aria-controls="naverSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
		            <div class="collapse navbar-collapse" id="navbarEexample7">
			         　<ul class="nav navbar-link">
				        <li><a class="aa" href="/admin/news">編集画面</a></li>
                        <li><a class="aa" href="/admin/news/create">新規作成</a></li>
			           </ul>
                    <div class="collapse navbar-collapse" id="navbarSupportContent">
                        <ul class="navbar-nav mr-auto">
                            
                        </ul> 
                        <ul class="nuvbar-nav ml-auto">
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
      </div>
      <div class="share-button">
      <ul>
    　<p>＼友達に教える／</p>
      <a class="fab fa-twitter" href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">Tweet</a>
      <a class="fab fa-facebook" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">Facebook</a>
      <a class="fab fa-line" href="javascript:window.open('http://line.me/R/msg/text/?'+encodeURIComponent(document.title)+'%20'+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">LINE</a>
      <a href="https://twitter.com/intent/tweet?text={text}&url={url}&hashtags={hashtags}?" onclick="window.open(this.href,'TWwindow','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;">ボタンに表示されるテキスト</a>

      </ul>
      </div>
    </body>
</html>