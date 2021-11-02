@extends('layouts/dashboard')

@section('title', 'News | Buat')

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

@section('page-name', 'News | Buat')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/news">News</a></li>
    <li class="breadcrumb-item active">Buat</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="{{route('pcra.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah PCRA</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pcra.." required>
                    </div>
                    <div class="form-group">
                        <label for="surveyor">Surveyor</label>
                        <input type="text" class="form-control" id="surveyor" name="surveyor" placeholder="Masukkan nama Surveyor.." required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal dan Waktu Pelaksanaan</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" id="time_start" name="time_start" required />
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Proyek Selesai</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" id="time_end" name="time_end" required />
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dept">Departemen</label>
                        <input type="text" class="form-control" id="dept" name="dept" placeholder="Masukkan nama Departemen.." required>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Rancangan Proyek</label>
                                <select class="form-control" id="plan" name="plan">
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak Ada</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Kelengkapan APD</label>
                                <select class="form-control" id="apd" name="apd">
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak Ada</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Tanda Peringatan</label>
                                <select class="form-control" id="warning" name="warning">
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak Ada</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $('#reservationdatetime').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });
</script>
@endsection