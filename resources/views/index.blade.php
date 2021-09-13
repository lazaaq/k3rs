@extends('layouts.main')

@section('title')
K3RS | Home
@endsection

@section('css')
<style>
    .hero {
        background-color: #1B1919;
        height: 100vh;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@section('navbar') @extends('partials.navbar') @endsection

@section('contents')
<div class="hero">
    <div class="container">
        @auth
        <h1>SUDAH BERHASIL LOGIN</h1>
        @else
        <h1>SILAHKAN LOGIN</h1>
        @endauth
    </div>
</div>
@endsection