@extends('layouts/dashboard')

@section('title', 'K3RS | Pegawai')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Pegawai')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Pegawai</li>
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
            <a href="/dashboard/employee/create" class="btn btn-primary">Tambah Pegawai</a>
        </div>
    </div>
    <table class="table table-striped table-hover m-2">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Manager</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->manager->name }}</td>
                <td>
                    <a class="btn btn-success" href="/dashboard/employee/{{$employee->id}}">
                        <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <a class="btn btn-warning" href="/dashboard/employee/{{$employee->id}}/edit">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>
                    <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                    <div class="modal" tabindex="-1" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Pegawai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus Pegawai ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                                    <form style="width: fit-content;" action="{{route('employee.destroy', $employee->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit" title="Hapus" id="hapus">
                                            Hapus
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
        {{ $employees->links() }}
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection