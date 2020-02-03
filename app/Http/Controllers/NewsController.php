<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
//検索機能
       $cond_title = $request->cond_title;
        if ($cond_title != '') {
          $collection1 = News::where("title", "LIKE", '%'.mb_convert_kana($cond_title,"KVC").'%')->orderBy('created_at','desc')->get();
          $collection2 = News::where("title", "LIKE", '%'.mb_convert_kana($cond_title,"KVc").'%')->orderBy('created_at','desc')->get();
          $posts = $collection1->merge($collection2);
          
          //dd($posts);

          //$posts = News::where('title','LIKE','%'.$cond_title.'%')->orderBy('created_at','desc')->paginate(5);
        }else {
          $posts = News::orderBy('created_at','desc')->get();
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