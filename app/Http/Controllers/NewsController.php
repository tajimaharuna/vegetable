<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;

class NewsController extends Controller
{
    //
    public function index(Request $request)
    {

       $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = News::where('title', $cond_title)->orderBy('created_at','desc')->get();
        }else {
          // それ以外はすべてのニュースを取得する
          $posts = News::orderBy('created_at','desc')->paginate(5);
        }

        if(count($posts) > 0){
          // 最新記事とそれ以下の表記を変える   
          $headline = $posts->shift();
        }else{
          $headline = null;
        }
        
      return view('news.index', ['posts' => $posts, 'cond_title' => $cond_title ,'headline' => $headline]);
  }
}