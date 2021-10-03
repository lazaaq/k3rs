@extends('layouts/dashboard')

@section('title', 'APAR')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'APAR')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">APAR</li>
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
            <a href="/dashboard/apar/create" class="btn btn-primary">Tambah APAR</a>
        </div>
    </div>
    <table class="table table-hover table-striped m-2">
        <thead>
            <th>Id</th>
            <th>Lokasi</th>
            <th>Waktu</th>
            <th>Kode</th>
            <th>Kadaluwarsa</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($apars as $apar)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $apar->location }}</td>
                <td>{{ Carbon\Carbon::parse($apar->time)->format('d F Y') }}</td>
                <td>{{ $apar->code }}</td>
                <td>{{ Carbon\Carbon::parse($apar->expired)->format('d F Y') }}</td>
                <td class="d-flex">
                    <a class="btn btn-success" href="/dashboard/apar/{{ $apar->id }}">
                        <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <a class="btn btn-warning mx-2" href="/dashboard/apar/{{ $apar->id }}/edit">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>
                    <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                    <div class="modal" tabindex="-1" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Apar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to delete this apar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                                    <form style="width: fit-content;" action="{{route('apar.destroy', $apar->id)}}" method="POST">
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
        {{ $apars->links() }}
    </div>

</section>
@endsection