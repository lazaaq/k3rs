@extends('layouts/dashboard')

@section('title', 'News')

@section('css')
<style>
    .box {
        background-color: white;
        padding: 2vw;
        border: 1px black solid;
        border-radius: 1vw;
        margin: 1vw 0.5vw;
    }
</style>
@endsection

@section('page-name', 'News')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">News</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $news->id }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $news->image }}" required>
        </div>
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea type="text" class="form-control" id="excerpt" name="excerpt" rows="3" required>{{ $news->excerpt }}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" class="form-control" id="body" name="body" cols="30" rows="10" required>{{ $news->body }}</textarea>
        </div>
        <div class="row">
            <a href="/dashboard/news/{{ $news->id }}" class="btn btn-secondary mx-2">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection