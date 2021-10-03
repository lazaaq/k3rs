@extends('layouts/dashboard')

@section('title', 'Pegawai | Detail')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Pegawai | Detail')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/employee">Pegawai</a></li>
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
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $employee->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Nama</b>
        </div>
        <div class="col-10">
            {{ $employee->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Email</b>
        </div>
        <div class="col-10">
            {{ $employee->email }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Alamat</b>
        </div>
        <div class="col-10">
            {{ $employee->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Tanggal Lahir</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($employee->birth)->format('d F Y') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Jenis Kelamin</b>
        </div>
        <div class="col-10">
            {{ $employee->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Manager</b>
        </div>
        <div class="col-10">
            <a href="/dashboard/manager/{{ $employee->manager->id }}" class="btn btn-info">{{ $employee->manager->name }}</a>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gaji</b>
        </div>
        <div class="col-10">
            Rp{{ number_format($employee->salary->salary_amount, 0, ',', '.') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Tanggal Dibuat</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($employee->created_at)->format('d F Y - h:i:s') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Terakhir Diupdate</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($employee->updated_at)->format('d F Y - h:i:s') }}
        </div>
    </div>
    <div class="row mt-5">
        <a href="/dashboard/employee" class="btn btn-secondary">Kembali</a>
        <a class="btn btn-warning mx-2" href="/dashboard/employee/{{$employee->id}}/edit">
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
                        <h5 class="modal-title">Delete Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete this Employee?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                        <form style="width: fit-content;" action="{{route('employee.destroy', $employee->id)}}" method="POST">
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

@section('js')
<script>

</script>
@endsection