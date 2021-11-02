@extends('layouts/dashboard')

@section('title', 'B3')

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

@section('page-name', 'B3')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">B3</li>
</ol>
@endsection

@section('contents')
<section class="content">
    @if(session()->has('success_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('success_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_updated') }}
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
            <a href="/dashboard/b3s/create" class="btn btn-primary">Tambah B3</a>
        </div>
    </div>
    <table class="table table-hover table-striped m-2">
        <thead>
            <th>No</th>
            <th>Lokasi</th>
            <th class="d-none d-lg-block">Waktu</th>
            <th>Jenis</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($b3s as $b3)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $b3->location }}</td>
                <td class="d-none d-lg-block">{{ Carbon\Carbon::parse($b3->datetime)->format('d M Y H:m:s') }}</td>
                <td>{{ $b3->type }}</td>
                <td class="d-flex">
                    <a class="btn btn-success" href="/dashboard/b3s/{{ $b3->id }}">
                        <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <a class="btn btn-warning mx-2" href="/dashboard/b3s/{{ $b3->id }}/edit">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>
                    <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                    <div class="modal" tabindex="-1" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete B3</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to delete this B3?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                                    <form style="width: fit-content;" action="{{route('b3s.destroy', $b3->id)}}" method="POST">
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex">
        {{ $b3s->links() }}
    </div>

</section>
@endsection