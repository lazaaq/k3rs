@extends('layouts/dashboard')

@section('title', 'Profil | Change')

@section('css')

@endsection

@section('page-name', 'Profil | Change')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
    <li class="breadcrumb-item active">Change</li>
</ol>
@endsection


@section('contents')
<section class="content container">
    <form action="/profil" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
        </div>
        <button href="/profil" class="btn btn-primary">Simpan</button>
    </form>
</section>
@endsection