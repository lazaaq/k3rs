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
    <li class="breadcrumb-item"><a href="/dashboard/disease">Disease</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/disease/{{$disease->id}}">Show</a></li>
    <li class="breadcrumb-item active">Victim</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 container">
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $victim->employee->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Nama</b>
        </div>
        <div class="col-10">
            {{ $victim->employee->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Email</b>
        </div>
        <div class="col-10">
            {{ $victim->employee->email }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Address</b>
        </div>
        <div class="col-10">
            {{ $victim->employee->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Birth</b>
        </div>
        <div class="col-10">
            {{ $victim->employee->birth }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gender</b>
        </div>
        <div class="col-10">
            {{ $victim->employee->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Manager Name</b>
        </div>
        <div class="col-10">
            <a href="/dashboard/manager/{{ $victim->employee->manager->id }}" class="btn btn-info">{{ $victim->employee->manager->name }}</a>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Salary</b>
        </div>
        <div class="col-10">
            Rp{{ number_format($victim->employee->salary->salary_amount, 0, ',', '.') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Salary Range</b>
        </div>
        <div class="col-10">
            {{ $victim->salary_range }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Chronology</b>
        </div>
        <div class="col-10">
            {{ $victim->chronology }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>First Aid</b>
        </div>
        <div class="col-10">
            {{ $victim->first_aid }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Effect</b>
        </div>
        <div class="col-10">
            {{ $victim->effect }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Condition</b>
        </div>
        <div class="col-10">
            {{ $victim->condition }}
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
        <a href="/dashboard/disease/{{$disease->id}}" class="btn btn-secondary">Back</a>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection