@extends('layouts/dashboard')

@section('title', 'Berita')

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

@section('page-name', 'Berita')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Berita</li>
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
        <div class="col-2 ml-auto mb-3">
            <a href="/dashboard/news/create" class="btn btn-primary">Tambah Berita</a>
        </div>
    </div>
    @foreach($newss as $news)
    <div class="card border">
        <div class="card-header">
            <h3 class="display-6">
                {{ $news->title }}
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="d-flex mb-3">
                <b><i class="bi bi-person-circle"></i> {{ $news->author  }}</b>
                <b class="ml-auto">{{ Carbon\Carbon::parse($news->created_at)->format('d F Y - h:i:s')}}</b>
            </div>
            <p>{{ $news->excerpt }}</p>
            <a href="/dashboard/news/{{ $news->id }}" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @endforeach

    <div class="d-flex">
        {{ $newss->links() }}
    </div>
</section>
@endsection