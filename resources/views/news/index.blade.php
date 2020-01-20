@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="titleWrap">
          <p class="white-color">
            <span class="white-text">
              Welcome to kashima Farm!!<br>
              むさしこすぎの八百屋さん
            </span>
          </p>
            <div class="img-box"><img src="https://tajimaharuna-vegetable.s3.us-east-2.amazonaws.com/vaP0moHHOXwlfj3MMol5XQJIAxa8nIanOTJKM5pT.jpeg"></div>
          <p class="black-color">
            <span class="black-text">
              Welcome to kashima Farm!!<br>
              むさしこすぎの八百屋さん
            </span>
          </p>
        </div>
        <h2>お野菜豆知識！</h2>
        　<hr color="#c0c0c0">
            <div class="col-md-8">
                <form action="{{ action('NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-3">タイトルで検索</label>
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
                            <p>＠{{ str_limit($headline->name, 20) }}</p>
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
                                    <p>＠{{ str_limit($post->name, 20) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
@endsection