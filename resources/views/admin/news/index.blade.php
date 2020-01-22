@extends('layouts.admin')
@section('title', '登録済み野菜豆知識の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>みんなの野菜豆知識一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary">投稿の新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-3">野菜名で検索する</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p>※自分の投稿内容のみ編集・削除ができます。</p>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">野菜名</th>
                                <th width="40%">本文</th>
                                <th width="10%">投稿者名</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->title, 100) }}</td>
                                    <td>{{ str_limit($news->body, 250) }}</td>
                                    <td>{{ str_limit($news->user_name, 20) }}</td>
                                    <td>
                                      @if($news->user_id == Auth::user()->id)
                                        <div><a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a></div>
                                    　　<div><a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a></div>
                                    　@endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection