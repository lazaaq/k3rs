@extends('layouts/dashboard')

@section('title', 'APAR | Buat')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'APAR | Buat')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/apar">APAR</a></li>
    <li class="breadcrumb-item active">Buat</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                Create APAR
            </div>
            <div class="card-body">
                <form action="{{route('apar.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <br>
                        <input type="file" id="image" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Waktu</label>
                        <input type="date" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="mb-3">
                        <label for="expired" class="form-label">Kadaluwarsa</label>
                        <input type="date" class="form-control" id="expired" name="expired" required>
                    </div>
                    <div class="row">
                        <a href="/dashboard/apar" class="btn btn-secondary mx-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection