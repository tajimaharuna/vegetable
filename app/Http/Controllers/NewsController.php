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
//検索機能
       $cond_title = $request->cond_title;
        if ($cond_title != '') {
          $posts = News::where('title','like','%'.$cond_title.'%')->orderBy('created_at','desc')->paginate(5);
        }else {
          $posts = News::orderBy('created_at','desc')->paginate(5);
        }
        
//最新投稿の表記を変える
        if(count($posts) > 0){
          $headline = $posts->shift();
        }else{
          $headline = null;
        }
        
      return view('news.index', ['posts' => $posts, 'cond_title' => $cond_title ,'headline' => $headline]);
  }
}