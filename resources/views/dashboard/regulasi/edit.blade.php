@extends('layouts/dashboard')

@section('title', 'Regulasi | Edit')

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

@section('page-name', 'Regulasi | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/regulasi">Regulasi</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="{{ route('regulasi.update', $regulasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id" value="{{ $regulasi->id }}">
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $regulasi->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $regulasi->description }}" required>
        </div>
        <div class="form-group">
            <label for="file">Pilih File</label>
            <br>
            <input type="file" class="" id="file" name="file">
        </div>
        <div class="row mt-5">
            <a href="/dashboard/regulasi" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection