@extends('layouts/dashboard')

@section('title', 'Regulasi')

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

@section('page-name', 'Regulasi')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/regulasi">Regulasi</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="{{ route('regulasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $regulasi->id }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $regulasi->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $regulasi->description }}" required>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="text" class="form-control" id="file" name="file" value="{{ $regulasi->file }}" required>
        </div>
        <div class="row">
            <a href="/dashboard/regulasi/{{ $regulasi->id }}" class="btn btn-secondary mr-2">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection