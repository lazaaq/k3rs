@extends('layouts/dashboard')

@section('title', 'Regulasi | Buat')

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

@section('page-name', 'Regulasi | Buat')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/regulasi">Regulasi</a></li>
    <li class="breadcrumb-item active">Buat</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="/dashboard/regulasi/create/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="10" required></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Pilih File</label>
            <br>
            <input type="file" class="" name="file" required>
        </div>
        <div class="row">
            <a href="/dashboard/regulasi" class="btn btn-secondary mr-2">Back</a>
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection