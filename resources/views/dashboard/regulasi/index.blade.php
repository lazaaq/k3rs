@extends('layouts/dashboard')

@section('title', 'Regulasi')

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

@section('page-name', 'Regulasi')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Regulasi</li>
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
            <a href="/dashboard/regulasi/create" class="btn btn-primary">Tambah Regulasi</a>
        </div>
    </div>
    @foreach($regulasi as $reg)
    <div class="box">
        <h3>{{ $reg->title }}</h3>
        <h6>{{ $reg->description  }}</h6>
        <div>
            <a href="/dashboard/regulasi/{{ $reg->id  }}" class="btn btn-primary">Read More</a>
            <a href="/dashboard/regulasi/download/{{ $reg->file  }}" class="btn btn-info">View File</a>
        </div>
    </div>
    @endforeach

    <div class="d-flex">
        {{ $regulasi->links() }}
    </div>
</section>
@endsection