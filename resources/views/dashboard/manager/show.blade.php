@extends('layouts/dashboard')

@section('title', 'Manager | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Manager | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/apar">Manager</a></li>
    <li class="breadcrumb-item active">Show</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 container">
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $manager->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Nama</b>
        </div>
        <div class="col-10">
            {{ $manager->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Email</b>
        </div>
        <div class="col-10">
            {{ $manager->email }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Birth</b>
        </div>
        <div class="col-10">
            {{ $manager->birth }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gender</b>
        </div>
        <div class="col-10">
            {{ $manager->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Address</b>
        </div>
        <div class="col-10">
            {{ $manager->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Salary</b>
        </div>
        <div class="col-10">
            Rp{{ number_format($manager->salary->salary_amount, 0, ',', '.') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $manager->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $manager->updated_at }}
        </div>
    </div>
    <a href="/dashboard/manager" class="btn btn-primary mt-5">Back</a>
</section>
@endsection

@section('js')
<script>

</script>
@endsection