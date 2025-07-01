<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // モデルからインスタンスを生成
        $article = new Article;
        // $requestにformからのデータが格納されているので、以下のようにそれぞれ代入する
        $article->title = $request->title;
        $article->body = $request->body;
        // 保存
        $article->save();
        // 保存後 一覧ページへリダイレクト
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 引数で受け取った$idを元にfindでレコードを取得
        $article = Article::find($id);
        // viewにデータを渡す
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // idを元にレコードを検索して$articleに代入
        $article = Article::find($id);
        // editで編集されたデータを$articleにそれぞれ代入する
        $article->title = $request->title;
        $article->body = $request->body;
        // 保存
        $article->save();
        // 詳細ページへリダイレクト
        return redirect("/articles/".$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // idを元にレコードを検索
        $article = Article::find($id);
        // 削除
        $article->delete();
        // 一覧にリダイレクト
        return redirect('/articles');
    }
}
