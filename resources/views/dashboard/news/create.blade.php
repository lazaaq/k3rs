@extends('layouts/dashboard')

@section('title', 'Berita | Buat')

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

@section('page-name', 'Berita | Buat')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/news">Berita</a></li>
    <li class="breadcrumb-item active">Buat</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <div class="card card-primary">
        <div class="card-header">
            Buat Berita
        </div>
        <div class="card-body">
            <form action="/dashboard/news/create/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required placeholder="Judul">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" required placeholder="Author">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <br>
                    <input type="file" id="image" name="image" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea type="text" class="form-control" id="body" name="body" rows="10" required placeholder="Body"></textarea>
                </div>
                <div class="mb-3">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali</a>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection