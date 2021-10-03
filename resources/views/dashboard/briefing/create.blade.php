@extends('layouts/dashboard')

@section('title', 'Briefing | Create')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Briefing | Create')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/briefing">Briefing</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <div class="container">
        <form action="/dashboard/briefing/create/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="time" class="form-label">Jadwal</label>
                <input type="date" class="form-control" id="time" name="time" required>
            </div>
            <div class="mb-3">
                <label for="result" class="form-label">Hasil</label>
                <textarea class="form-control" id="result" name="result" rows="10" required></textarea>
            </div>
            <div class="row">
                <a class="btn btn-secondary ml-3 mr-2" href="/dashboard/briefing">Back</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection