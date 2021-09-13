@extends('layouts.main')

@section('title') K3RS | Login @endsection

@section('css')
<style>
    a {
        text-decoration: none;
        color: #F8EEB4;
        transition: 0.5s;
    }

    a:hover {
        color: #1B1919;
        transition: 0.5s;
    }

    .login {
        background-color: #1B1919;
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login .box {
        background-color: #A7D129;
        width: 27vw;
        min-height: fit-content;
        border-radius: 7px;
        padding: 2vw;
    }

    .login .head .judul {
        font-size: 2vw;
    }

    .login .head .horizontal-line {
        width: 100%;
        height: 0.3vw;
        background-color: #616F39;
        border-radius: 3px;
    }

    .login .body {
        margin-top: 1rem;
    }
</style>
@endsection

@section('contents')

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissable fade show position-absolute" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissable fade show position-absolute" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

<div class="login">
    <div class="container">
        <div class="box">
            <div class="head">
                <div class="judul">Silahkan Login</div>
                <div class="register">Not registered? <a href="/register">Register here</a></div>
                <div class="horizontal-line mt-2"></div>
            </div>
            <div class="body">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email">
                        <label for="email">Email</label>
                    </div>
                    @error('email') 
                        <div class="invaid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    @error('password') 
                        <div class="invaid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-success m-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection