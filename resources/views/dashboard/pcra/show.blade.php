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
        <h3 class="mb-3">PCRA</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Pegawai yang melaporkan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <a href="/dashboard/employee/{{$pcra->employee_id}}" class="btn btn-info">{{$pcra->employee->name}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Name</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->name}}</b>
            </div>
        </div>
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
                <b>{{ Carbon\Carbon::parse($pcra->time_start)->format('d F Y') }}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanggal Selesai Proyek</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{ Carbon\Carbon::parse($pcra->time_end)->format('d F Y') }}</b>
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
        {{-- Pembatas Konstruksi --}}
        <h3 class="mt-5">PCRA - Pembatas Konstruksi</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Celah Penghalang Debu</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->dust}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Ada Pembatas</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->barrier}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Akses Pintu Tertutup</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->door_access}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanda Area Berdebu</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->dusty_area}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanda Pintu Harus Tertutup</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->sign_door}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Ventilasi Tertutup</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->vent}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Komentar</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->construction->comment}}</b>
            </div>
        </div>
        {{-- Daerah Akses Staff Pasien --}}
        <h3 class="mt-5">PCRA - Daerah Akses Staff Pasien</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Plafon Tertutup & Kering</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->plafon}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Lantai Bersih</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->floor_clean}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Dinding Utuh dan Kering</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->wall}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Permukaan Lantai/Dinding Bebas Debu</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->floor_dustfree}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Pipa Ventilasi Ditutup</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->vent}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tidak Ada Gangguan Binatang Kecil</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->insect}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Komentar</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->access_areas->comment}}</b>
            </div>
        </div>
        {{-- Arus Lalu Lintas --}}
        <h3 class="mt-5">PCRA - Arus Lalu Lintas</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Pekerja Tidak Memasuki Daerah Perawatan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->traffic->barrier}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tempat Pembuangan Puing Tertutup</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->traffic->remove_puing}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Rute & Waktu Pembuangan Terjadwal</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->traffic->route}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Akses Bebas Hambatan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->traffic->access}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Komentar</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->traffic->comment}}</b>
            </div>
        </div>
        {{-- Detail --}}
        <h3 class="mt-5">PCRA - Detail</h3>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Hal Hal Yang Tidak Memenuhi Syarat</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->not_eligible}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Dilaporkan Kepada</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->reported}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanggal Laporan</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->reporting_date}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tanggal Survey Ulang</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->re_survey_date}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Surveyor</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->surveyor}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Sesuai Pencapaian</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->accordance}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p>Tindakan Lebih Lanjut</p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <b>{{$pcra->detail->further_action}}</b>
            </div>
        </div>
        {{-- Dokumentasi Renovasi --}}
        <h3 class="mt-5">PCRA - Dokumentasi Renovasi</h3>
        <hr>
        <div class="row">
            <table class="table table-hover table-striped">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Keterangan</th>
                </tr>
                @foreach($pcra->documentation as $docs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ 'documentation_image_' . $docs->id }}">
                            Lihat Gambar
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="{{ 'documentation_image_' . $docs->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($docs->image) }}" alt="" width="100%">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $docs->keterangan }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        {{-- Tombol --}}
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