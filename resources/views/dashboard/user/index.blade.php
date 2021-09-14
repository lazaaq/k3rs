@extends('layouts/dashboard')

@section('title', 'Profil')

@section('css')

@endsection

@section('page-name', 'Profil')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Profil</li>
</ol>
@endsection


@section('contents')
<section class="content container">
    @if(session()->has('success_update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('success_change_password'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_change_password') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-2 py-2">
            <b>User Id</b>
        </div>
        <div class="col-10">
            {{ $user->id }}
        </div>
    </div>
    <div class="row">
        <div class="col-2 py-2">
            <b>Name</b>
        </div>
        <div class="col-10">
            {{ $user->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-2 py-2">
            <b>Email</b>
        </div>
        <div class="col-10">
            {{ $user->email }}
        </div>
    </div>
    <div class="row">
        <div class="col-2 py-2">
            <b>Password</b>
        </div>
        <div class="col-10">
            {{ $user->password }}
        </div>
    </div>
    <a href="/profil/change" class="btn btn-primary">Edit Profil</a>
    <a href="/profil/check" class="btn btn-primary">Ganti Password</a>
</section>
@endsection