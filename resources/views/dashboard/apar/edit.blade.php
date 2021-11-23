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
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                Edit APAR
            </div>
            <div class="card-body">
                <form action="{{ route('apar.update', $apar->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $apar->id }}">
                    <div class="mb-3">
                        <label for="time" class="form-label">Waktu</label>
                        <input type="date" class="form-control" id="time" name="time" value="{{ $apar->time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $apar->location }}" required placeholder="Lokasi">
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ $apar->code }}" required placeholder="Kode">
                    </div>
                    <div class="mb-3">
                        <label for="expired" class="form-label">Kadaluwarsa</label>
                        <input type="text" class="form-control" id="expired" name="expired" value="{{ $apar->expired }}" required>
                    </div>
                    <div class="row">
                        <a href="/dashboard/apar/{{ $apar->id }}" class="btn btn-secondary mx-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection