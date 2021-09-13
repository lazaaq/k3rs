@extends('layouts/dashboard')

@section('title', 'News')

@section('css')
<style>
    .box {
        background-color: white;
        padding: 2vw;
        border: 1px black solid;
        border-radius: 1vw;
        margin: 1vw 0.5vw;
    }
</style>
@endsection

@section('page-name', 'News')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">News</li>
</ol>
@endsection

@section('contents')
<section class="content">
    @if(session()->has('success_delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_delete') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('success_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_added') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-2 ml-auto">
            <a href="/dashboard/news/create" class="btn btn-primary">Tambah News</a>
        </div>
    </div>
    @foreach($newss as $news)
    <div class="box">
        <h3>{{ $news->title }}</h3>
        <b>
            <ion-icon name="person-outline"></ion-icon>{{ $news->author }}
        </b>
        <p>{{ $news->excerpt }}</p>
        <a href="/dashboard/news/{{ $news->id }}" class="btn btn-primary">Read More</a>
    </div>
    @endforeach

    <div class="d-flex">
        {{ $newss->links() }}
    </div>
</section>
@endsection