@extends('layouts/dashboard')

@section('title', 'Berita | Detail')

@section('css')
<style>
    .box {
        background-color: white;
        padding: 2vw;
        border: 1px black solid;
        border-radius: 1vw;
        margin: 1vw 0.5vw;
    }
    @media only screen and (max-width: 575px){
        .content .container .row p {
            margin-bottom: 0;
        }
        .content .container .row {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection

@section('page-name', 'Pcra | Detail')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/pcra">Pcra</a></li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5">
    @if(session()->has('success_update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container mt-5">
        <h1 class="mb-3">{{ $pcra->name }}</h1>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Lokasi</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->location}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Surveyor</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->surveyor}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanggal dan Waktu Pelaksanaan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->time_start}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanggal Selesai Proyek</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->time_end}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Departemen</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->dept}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Rancangan Proyek</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->plan}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Kelengkapan APD</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->apd}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanda Peringatan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->warning}}</b>
            </div>
        </div>
        <div class="row mt-5">
            <a href="/dashboard/pcra" class="btn btn-secondary mr-2">Back</a>
            <a class="btn btn-warning mr-2" href="/dashboard/pcra/{{ $pcra->id }}/edit">
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
                            <h5 class="modal-title">Delete Pcra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete this pcra?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                            <form style="width: fit-content;" action="{{route('pcra.destroy', $pcra->id)}}" method="POST">
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
</section>
@endsection

@section('js')
<script>
    var modal = document.getElementById('modal');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection