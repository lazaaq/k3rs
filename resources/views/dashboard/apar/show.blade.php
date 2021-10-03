@extends('layouts/dashboard')

@section('title', 'APAR | Detail')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'APAR | Detail')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/apar">APAR</a></li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 container">
    @if(session()->has('success_update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center my-5">
        <img src="{{ $apar->image }}" alt="Image" width="80%" height="auto">
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $apar->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gambar</b>
        </div>
        <div class="col-10">
            {{ $apar->image }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Waktu</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($apar->time)->format('d F Y') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Lokasi</b>
        </div>
        <div class="col-10">
            {{ $apar->location }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Kode</b>
        </div>
        <div class="col-10">
            {{ $apar->code }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Kadaluwarsa</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($apar->expired)->format('d F Y') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Histori Apar</b>
        </div>
        @if(count($history_apar) != 0)
        <div class="col-10">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Datetime</th>
                    <th>Condition</th>
                    <th>Detail</th>
                </tr>
                @for($i = 0; $i < $history_apar->count(); $i++)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($history_apar[$i]->created_at)->format('d F Y - h:i:s') }}</td>
                        <td>{{ $history_apar[$i]->condition }}</td>
                        <td>{{ $history_apar[$i]->detail }}</td>
                    </tr>
                    @endfor
            </table>
        </div>
        @else
        <div class="text-success">
            Tidak ada
        </div>
        @endif
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Dibuat Pada</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($apar->created_at)->format('d F Y - h:i:s') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Diupdate Pada</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($apar->updated_at)->format('d F Y - h:i:s') }}
        </div>
    </div>
    <div class="row mt-5">
        <a href="/dashboard/apar" class="btn btn-secondary">Kembali</a>
        <a class="btn btn-warning mx-2" href="/dashboard/apar/{{ $apar->id }}/edit">
            <!-- <ion-icon name="pencil-outline"></ion-icon> -->
            Edit
        </a>
        <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
            <!-- <ion-icon name="trash-outline"></ion-icon> -->
            Delete
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
    </div>
</section>
@endsection