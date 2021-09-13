@extends('layouts.main')

@section('title') {{ $title }} @endsection

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
<div class="login">
    <div class="container">
        <div class="box">
            <div class="head">
                <div class="judul">Register</div>
                <div class="register">Already have an account? <a href="/login">Login here</a></div>
                <div class="horizontal-line mt-2"></div>
            </div>
            <div class="body">
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" required autofocus>
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('name') is-invalid @enderror" id="email" name="email" placeholder="Email" required>
                        <label for="email">Email</label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('name') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection