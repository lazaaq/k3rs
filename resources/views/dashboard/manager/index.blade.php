@extends('layouts/dashboard')

@section('title', 'Manager')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Manager')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Manager</li>
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
            <a href="/dashboard/manager/create" class="btn btn-primary">Tambah Manager</a>
        </div>
    </div>
    <table class="table table-striped table-hover m-2">
        <thead>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary Amount</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($managers as $manager)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $manager->name }}</td>
                <td>{{ $manager->email }}</td>
                <td>Rp{{ number_format($manager->salary->salary_amount, 0, ',', '.') }}</td>
                <td>
                    <a class="btn btn-success" href="/dashboard/manager/{{ $manager->id }}">
                        <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <a class="btn btn-warning" href="/dashboard/manager/{{ $manager->id }}/edit">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>
                    <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                    <div class="modal" tabindex="-1" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Manager</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to delete this Manager?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                                    <form style="width: fit-content;" action="{{route('manager.destroy', $manager->id)}}" method="POST">
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
        {{ $managers->links() }}
    </div>
</section>
@endsection