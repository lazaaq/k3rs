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
    @if(session()->has('error_confirm_password'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error_confirm_password') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form action="/profil/change_password" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}">
        <div class="mb-3">
            <label for="password1" class="form-label">Masukkan Password Baru</label>
            <input type="password" class="form-control" id="password1" name="password1" required>
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password2" name="password2" required>
        </div>
        <button href="/profil" class="btn btn-primary">Simpan</button>
    </form>
</section>
@endsection