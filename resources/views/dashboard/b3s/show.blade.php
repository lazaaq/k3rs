@extends('layouts/dashboard')

@section('title', 'B3 | Detail')

@section('css')
<style>
    .box {
        background-color: white;
        padding: 2vw;
        border: 1px black solid;
        border-radius: 1vw;
        margin: 1vw 0.5vw;
    }

    @media only screen and (max-width: 575px) {
        .content .container .row p {
            margin-bottom: 0;
        }

        .content .container .row {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection

@section('page-name', 'B3 | Detail')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/b3s">B3</a></li>
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
        {{-- B3 --}}
        <h3 class="">B3</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Pegawai yang melaporkan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <a href="/dashboard/employee/{{$b3->employee_id}}" class="btn btn-info">{{$b3->employee->name}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Lokasi</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->location}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Waktu</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{Carbon\Carbon::parse($b3->datetime)->format('d F Y H:i:s')}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Jenis</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->type}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Chronology</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->chronology}}</b>
            </div>
        </div>
        {{-- Tindakan yang dilakukan --}}
        <h3 class="mt-5">B3 - Tindakan Yang Dilakukan</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Lapor Supervisor Ruangan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->action->supervisor_room}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Lapor Supervisor/petugas Sanitasi</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->action->supervisor_sanitasi}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Mengeliminasi tumpahan dengan spil kit</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->action->eliminate}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Menggunakan Sarung tangan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->action->glove}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Membuang limbah pembersih di tempat sampah infeksius</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->action->waste}}</b>
            </div>
        </div>
        <h3 class="mt-5">B3 - Detail</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Manusia (Jenis Luka dan Lokasi Tubuh)</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->human}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Cuci bersih dengan air mengalir</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->wash}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Obati luka sesuai dengan kondisi</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->injury}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Perlu Opname</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->opname}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Alat/Sarana</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->tool}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Dampak terhadap lingkungan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->effect}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tindak Lanjut</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$b3->detail->follow_up}}</b>
            </div>
        </div>
        <div class="row mt-5">
            <a href="/dashboard/b3s" class="btn btn-secondary mr-2">Back</a>
            <a class="btn btn-warning mr-2" href="/dashboard/b3s/{{ $b3->id }}/edit">
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
                            <form style="width: fit-content;" action="/dashboard/b3s/{{ $b3->id }}/destroy" method="POST">
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