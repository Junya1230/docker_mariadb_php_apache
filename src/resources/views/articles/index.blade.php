{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleタグの値を代入 --}}
@section('title', '記事一覧')

{{-- application.blade.phpの@yield('content')に以下のレイアウトを代入 --}}
@section('content')
<div>
    <a href="/articles/create">新規作成</a>
</div>
<table>
    @foreach ($articles as $article)
        <tr>
            <td>{{$article->title}}</td>
            <td>{{$article->body}}</td>
            <td><a href="/articles/{{$article->id}}">詳細を表示</a></td>
            <td><a href="/articles/{{$article->id}}/edit">編集する</a></td>
            <td>
                <form action="/articles/{{$article->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" name="" value="削除する">
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
