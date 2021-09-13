@extends('layouts/dashboard')

@section('title', 'News | Create')

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

@section('page-name', 'News | Create')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/news">News</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="/dashboard/news/create/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <br>
            <input type="file" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea type="text" class="form-control" id="excerpt" name="excerpt" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea type="text" class="form-control" id="body" name="body" rows="10" required></textarea>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection