@extends('layouts/dashboard')

@section('title', 'K3RS | Briefing')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Briefing | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/briefing">Briefing</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <div class="container">
        <form action="{{ route('briefing.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $briefing->id }}">
            <div class="mb-3">
                <label for="time" class="form-label">Jadwal</label>
                <input type="date" class="form-control" id="time" name="time" value="{{ $briefing->time }}" required>
            </div>
            <div class="mb-3">
                <label for="result" class="form-label">Result</label>
                <textarea class="form-control" id="result" name="result" rows="15" required>{{ $briefing->result }}</textarea>
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