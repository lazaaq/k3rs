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
    <li class="breadcrumb-item"><a href="/dashboard/disease">Disease</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/disease/{{$disease->id}}">Show</a></li>
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
            {{ $witness->employee->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Email</b>
        </div>
        <div class="col-10">
            {{ $witness->employee->email }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Address</b>
        </div>
        <div class="col-10">
            {{ $witness->employee->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Birth</b>
        </div>
        <div class="col-10">
            {{ $witness->employee->birth }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gender</b>
        </div>
        <div class="col-10">
            {{ $witness->employee->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Manager Id</b>
        </div>
        <div class="col-10">
            {{ $witness->employee->manager_id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Salary Id</b>
        </div>
        <div class="col-10">
            {{ $witness->employee->salary_id }}
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
        <a href="/dashboard/disease/{{$disease->id}}" class="btn btn-secondary">Back</a>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection