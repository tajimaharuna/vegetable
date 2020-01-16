<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\History;
use Carbon\Carbon;
use Storage;

class NewsController extends Controller
{
    //
    public function add()
  {
      return view('admin.news.create');
  }
  
    public function create(Request $request)
    {
    // 新規作成ページ情報をDBに保存
      $this->validate($request, News::$rules);
      $news = new News;
      $form = $request->all();
      
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $news->image_path = Storage::disk('s3')->url($path);
      } else {
          $news->image_path = null;
      }
      
      unset($form['_token']);
      unset($form['image']);
      
      $news->fill($form);
      $news->save();
      
        return redirect('admin/news');
    }
    
    public function index(Request $request)
    {
    // 検索機能
        $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = News::where('title', $cond_title)->get();
      } else {
          $posts = News::all();
      }
      return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit',['news_form'=>$news]);
    }
    
    public function update(Request $request)
    {
    // 画像をs３に保存
        $this->validate($request, News::$rules);
        $news = News::find($request->id);
        $news_form = $request->all();
        $form = $request->all();
        
        if (isset($news_form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $news->image_path = Storage::disk('s3')->url($path);
        unset($news_form['image']);
      } 
        elseif (isset($request->remove)) {
        $news->image_path = null;
        unset($news_form['remove']);
      }
        unset($news_form['_token']);
        $news->fill($news_form)->save();
        
    // 編集履歴
        $history = new History;
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/news');
    }
    
    public function delete(Request $request)
    {
    // 削除機能
        $news = News::find($request->id);
        $news->delete();
        return redirect('admin/news');
    }
}
