@extends('layouts/dashboard')

@section('title', 'Disease | Edit')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Disease | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/disease">Disease</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <form action="{{ route('disease.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $disease->id }}">
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="date" class="form-control" id="time" name="time" value="{{ $disease->time }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $disease->location }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $disease->image }}" required>
        </div>
        <div class="row">
            <a href="/dashboard/disease/{{ $disease->id }}" class="btn btn-secondary mx-2">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>
@endsection