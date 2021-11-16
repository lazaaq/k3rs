@extends('layouts/dashboard')

@section('title', 'Pcra | Edit')

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

@section('page-name', 'Pcra | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/pcra">Pcra</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<div class="contents container pb-5">
    <form action="{{route('pcra.update', $pcra->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit PCRA</h3>
            </div>
            <form name="form1">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$pcra->name}}" placeholder="Masukkan Nama Pcra.." required>
                    </div>
                    <div class="form-group">
                        <label for="surveyor">Surveyor</label>
                        <input type="text" class="form-control" id="surveyor" name="surveyor" value="{{$pcra->surveyor}}" placeholder="Masukkan nama Surveyor.." required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal dan Waktu Pelaksanaan</label>
                        <div class="input-group date" id="reservationdatetime1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime1" name="time_start" id="time_start" value="{{ $pcra->time_start }}"/>
                            <div class="input-group-append" data-target="#reservationdatetime1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal dan Waktu Selesai</label>
                        <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime2" value="{{ Carbon\Carbon::parse($pcra->time_end)->format('d m Y H:i:s') }}" name="time_end" />
                            <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="surveyor">Surveyor</label>
                        <input type="text" class="form-control" id="surveyor" name="surveyor" value="{{$pcra->surveyor}}" placeholder="Masukkan nama Surveyor.." required>
                    </div>
                    <div class="form-group">
                        <label for="dept">Departemen</label>
                        <input type="text" class="form-control" id="dept" name="dept" value="{{$pcra->dept}}" placeholder="Masukkan nama Departemen.." required>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Rancangan Proyek</label>
                                <select class="form-control" id="plan" name="plan">
                                    <option value="ada" @if($pcra->plan == "ada") selected @endif>Ada</option>
                                    <option value="tidak" @if($pcra->plan == "tidak") selected @endif>Tidak Ada</option>
                                    <option value="lainnya" @if($pcra->plan == "lainnya") selected @endif>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Kelengkapan APD</label>
                                <select class="form-control" id="apd" name="apd">
                                    <option value="ada" @if($pcra->apd == "ada") selected @endif>Ada</option>
                                    <option value="tidak" @if($pcra->apd == "tidak") selected @endif>Tidak Ada</option>
                                    <option value="lainnya" @if($pcra->apd == "lainnya") selected @endif>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Tanda Peringatan</label>
                                <select class="form-control" id="warning" name="warning">
                                    <option value="ada" @if($pcra->warning == "ada") selected @endif>Ada</option>
                                    <option value="tidak" @if($pcra->warning == "tidak") selected @endif>Tidak Ada</option>
                                    <option value="lainnya" @if($pcra->warning == "lainnya") selected @endif>Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('pcra.show', $pcra->id) }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $('#reservationdatetime1').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });
    $('#reservationdatetime2').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });
    var Myelement = document.getElementById('time_start');
    Myelement.setAttribute('value','12:12:12');
</script>
@endsection