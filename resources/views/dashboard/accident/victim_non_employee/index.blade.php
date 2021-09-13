@extends('layouts/dashboard')

@section('title', 'Victim | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Victim | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/accident">Accident</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/accident/{{$accident->id}}">Show</a></li>
    <li class="breadcrumb-item active">Victim</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 container">
    <div class="row py-2">
        <div class="col-2">
            <b>Name</b>
        </div>
        <div class="col-10">
            {{ $victim->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Birth</b>
        </div>
        <div class="col-10">
            {{ $victim->birth }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gender</b>
        </div>
        <div class="col-10">
            {{ $victim->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Address</b>
        </div>
        <div class="col-10">
            {{ $victim->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Job</b>
        </div>
        <div class="col-10">
            {{ $victim->job }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $victim->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $victim->updated_at }}
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