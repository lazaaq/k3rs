@extends('layouts/dashboard')

@section('title', 'Accident | Edit')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Accident | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/accident">Accident</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <form action="{{ route('accident.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $accident->id }}">
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="date" class="form-control" id="time" name="time" value="{{ $accident->time }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $accident->location }}" required placeholder="Lokasi">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $accident->image }}" required>
        </div>
        <div class="row">
            <a href="/dashboard/accident/{{ $accident->id }}" class="btn btn-secondary mx-2">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>
@endsection