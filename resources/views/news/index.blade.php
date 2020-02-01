@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="titleWrap">
          <p class="white-color">
            <span class="white-text">
              Welcome to kashima Farm!!<br>
              武蔵小杉の新鮮野菜
            </span>
          </p>
            <div class="img-box"><img src="https://tajimaharuna-vegetable.s3.us-east-2.amazonaws.com/vaP0moHHOXwlfj3MMol5XQJIAxa8nIanOTJKM5pT.jpeg"></div>
          <p class="black-color">
            <span class="black-text">
              Welcome to kashima Farm!!<br>
              武蔵小杉の新鮮野菜
            </span>
          </p>
        </div>
        <div class="messageWrap" id="message">
			<div class="messageBox">
			   <div class="messageText">
				<h2>なんか落ち着く、小さな直売所です。</h2>
				</br>
				<p>鹿島農園は川崎市で何代も続く農家が営む、農家の直売所です。</br>
				</br>
				武蔵中原駅から徒歩１５分、武蔵小杉駅から自転車で１５分の位置にあり、</br>
				ご近所の方から県外の方まで多くの皆様にご利用いただいています。</br>
				</br>
				鹿島農園では、すぐ横の畑で収穫した瑞々しいお野菜を皆様にお届けします。</br>
				ちょっとついてる泥は、新鮮の証です。</br>
				</br>
				鹿島農園のお野菜はほとんど農薬を使わずに育てているので、</br>
				小さなお子様でも安心して食べられます。</br>
				</br>
				たくさんの太陽を浴びた栄養満点の旬のお野菜を、</br>
				多くの皆さんに食べていただきたいと思っています。</p>
			   </div>
			</div>
			<div class="message-img">
				<img src="https://tajimaharuna-vegetable.s3.us-east-2.amazonaws.com/IMG_6407.JPG">
			</div>
		</div>
		<div class="vege-news">
		<p>鹿島農園のお野菜を使ったレシピや、長持ちする保存法などをご紹介します</p>
        <h2>＼みんなの野菜の豆知識！vegitter／</h2>
        </div>
        <div class="linkWrap">
            <div class="link-box">
                <a href="/login" class="btn-radius-white">マイページログイン</a>
                <a href="/admin/news" class="btn-radius-white">記事を編集する</a>
                <a href="/admin/news/create" class="btn-radius-white">新しい記事を書く</a>
                <a href="/register" class="btn-radius-orange">新規ユーザー登録（無料）</a>
                <p></br>はじめての方はユーザー登録が必要です。</p>
            </div>
        </div>
        　<hr color="#c0c0c0">
            <div class="col-md-8 form">
                <form action="{{ action('NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-3">野菜名で検索</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="new_box new_icon">
                                </div>
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ $headline->image_path }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                                <div class="date">
                                    {{ $headline->updated_at->format('Y年m月d日') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                            <p>＠{{ str_limit($headline->user_name, 20) }}</p>
                        </div>
                        <div class="share-button">
                          <ul>
                              <a class="fab fa-twitter" href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">Tweet</a>
                              <a class="fab fa-facebook" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">Facebook</a>
                              <a class="fab fa-line" href="javascript:window.open('http://line.me/R/msg/text/?'+encodeURIComponent(document.title)+'%20'+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">LINE</a>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ $post->image_path }}">
                                    <p>＠{{ str_limit($post->user_name, 20) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection