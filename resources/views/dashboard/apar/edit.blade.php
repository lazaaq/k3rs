@extends('layouts/dashboard')

@section('title', 'APAR | Edit')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'APAR | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/apar">APAR</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <form action="{{ route('apar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $apar->id }}">
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="date" class="form-control" id="time" name="time" value="{{ $apar->time }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $apar->location }}" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $apar->code }}" required>
        </div>
        <div class="mb-3">
            <label for="expired" class="form-label">Expired</label>
            <input type="text" class="form-control" id="expired" name="expired" value="{{ $apar->expired }}" required>
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="condition" id="condition1" value="baik" @if($apar->condition === 'baik') checked @endif>
                <label class="form-check-label" for="condition1">
                    Baik
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="condition" id="condition2" value="tidak baik" @if($apar->condition === 'tidak baik') checked @endif>
                <label class="form-check-label" for="condition2">
                    Tidak Baik
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">Detail</label>
            <textarea type="text" name="detail" id="detail" class="form-control" id="" cols="30" rows="10" required>{{ $apar->detail}}</textarea>
        </div>
        <div class="row">
            <a href="/dashboard/apar/{{ $apar->id }}" class="btn btn-secondary mx-2">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>
@endsection