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
    @if(session()->has('success_update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-2 ml-auto mb-3">
            <a href="/dashboard/regulasi/create" class="btn btn-primary">Tambah Regulasi</a>
        </div>
    </div>
    @foreach($regulasis as $regulasi)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="bi bi-file-earmark-ruled"></i>
                {{ $regulasi->title }}
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h6>{{ $regulasi->description  }}</h6>
            <div class="row">
                <a href="/{{ $regulasi->file }}" class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                    Lihat File
                </a>
                <a class="btn btn-warning mx-2" href="/dashboard/regulasi/{{ $regulasi->id }}/edit">
                    <ion-icon name="pencil-outline"></ion-icon>
                    Edit
                </a>
                <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
                    <ion-icon name="trash-outline"></ion-icon>
                    Hapus
                </button>
                <div class="modal" tabindex="-1" id="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Regulasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to delete this Regulasi?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                                <form style="width: fit-content;" action="{{route('regulasi.destroy', $regulasi->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary" type="submit" title="Hapus" id="hapus">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @endforeach

    <div class="d-flex">
        {{ $regulasis->links() }}
    </div>
</section>
@endsection