@extends('layouts/dashboard')

@section('title', 'Regulasi | Create')

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

@section('page-name', 'Regulasi | Create')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/regulasi">Regulasi</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="/dashboard/regulasi/create/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="10" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <br>
            <input type="file" id="file" name="file" required>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection