@extends('layouts/dashboard')

@section('title', 'Profil | Check')

@section('css')

@endsection

@section('page-name', 'Profil | Check')

@section('breadcrumb')

@endsection


@section('contents')
<section class="content container">
    @if(session()->has('error_check'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error_check') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('error_confirm_password'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error_confirm_password') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form action="/profil/check" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}">
        <div class="mb-3">
            <label for="password" class="form-label">Password Lama</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password1" name="password1" required>
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password2" name="password2" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</section>
@endsection