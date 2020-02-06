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
       //ひらがなをカタカナに変換
       $kana_title = mb_convert_kana($request->cond_title,"KVC");
       //カタカナをひらがなに変換
       $katakana_title = mb_convert_kana($request->cond_title,"KVc");
        if ($cond_title != '') {

          //reqestを曖昧検索、KVCを曖昧検索、KVcを曖昧検索、新着順に並べる
          $posts = News::where('title','LIKE','%'.$cond_title.'%')
                          ->orWhere('title','LIKE','%'.$kana_title.'%')
                          ->orWhere('title','LIKE','%'.$katakana_title.'%')
                          ->orderBy('created_at','desc')->paginate(5);
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