@extends('layouts/dashboard')

@section('title', 'Witness | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Witness | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/accident">Accident</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/accident/{{$accident->id}}">Show</a></li>
    <li class="breadcrumb-item active">Witness</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 container">
    <div class="row py-2">
        <div class="col-2">
            <b>Name</b>
        </div>
        <div class="col-10">
            {{ $witness->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Birth</b>
        </div>
        <div class="col-10">
            {{ $witness->birth }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>NIK</b>
        </div>
        <div class="col-10">
            {{ $witness->nik }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gender</b>
        </div>
        <div class="col-10">
            {{ $witness->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Address</b>
        </div>
        <div class="col-10">
            {{ $witness->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Job</b>
        </div>
        <div class="col-10">
            {{ $witness->job }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $witness->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $witness->updated_at }}
        </div>
    </div>
    <div class="row mt-5">
        <a href="/dashboard/accident/{{$accident->id}}" class="btn btn-secondary">Back</a>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection