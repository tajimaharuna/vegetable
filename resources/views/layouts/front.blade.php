<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="武蔵小杉の鹿島農園">
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/topreverse.js"></script>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}"defer></script>
        
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="https://tajimaharuna-vegetable.s3.us-east-2.amazonaws.com/icons8-%E3%83%8A%E3%82%B9-48.png">
    </head>
    
    <body>
        <div id="page_top"><a href="#"></a></div>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <ul class="nav navbar-link">
                        <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="https://tajimaharuna-vegetable.s3.us-east-2.amazonaws.com/logo_transparent.png"></a>
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
                     <div id="nav-drawer">
                          <input id="nav-input" type="checkbox" class="nav-unshown">
                          <label id="nav-open" for="nav-input"><span></span></label>
                          <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                          <div id="nav-content">
                            <ul id="gnav">
                             <li><a href="#contents01">ページトップ</a></li>
                             <li><a href="#contents02">わたしたちについて</a></li>
                             <li><a href="#contents03">みんなの野菜豆知識</a></li>
                             <li><a href="#contents04">アクセス</a></li>
                            </ul>
                          </div>
                     </div>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div
      </div>
                  {{-- googlemap --}}
    <div id="contents04">
      <div class="maps">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3245.3063926065556!2d139.63730271525574!3d35.57082868022012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc8e1192002531a6a!2z6bm_5bO26L6y5ZyS55u05aOy5omA!5e0!3m2!1sja!2sjp!4v1579754685016!5m2!1sja!2sjp" width="500" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        <div class="map-text">
            <h3>Access</h3>
            <h4>武蔵中原・武蔵小杉の野菜直売所</br>鹿島農園</h4>
            </br>
            <p>〒211-0041</br>神奈川県川崎市中原区下小田中６丁目２６−３</p>
            <p>AM9:00~なくなり次第・不定休</p>
        </div>
      </div>
                  {{-- シェアボタン --}}
      <div class="share-button">
          <ul>
    　        <p>＼友達に教える／</p>
              <a class="fab fa-twitter" href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">Tweet</a>
              <a class="fab fa-facebook" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">Facebook</a>
              <a class="fab fa-line" href="javascript:window.open('http://line.me/R/msg/text/?'+encodeURIComponent(document.title)+'%20'+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">LINE</a>
          </ul>
      </div>
     </div>
    </body>
</html>