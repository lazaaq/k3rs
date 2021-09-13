@extends('layouts/dashboard')

@section('title', 'Accident')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Accident')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Accident</li>
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
    <table class="table table-hover m-2">
        <thead>
            <th>No</th>
            <th>Employee ID</th>
            <th>Time</th>
            <th>Location</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($accidents as $accident)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $accident->employee_id }}</td>
                <td>{{ $accident->time }}</td>
                <td>{{ $accident->location }}</td>
                <td>{{ $accident->image }}</td>
                <td class="d-flex">
                    <a class="btn btn-success" href="/dashboard/accident/{{ $accident->id }}">
                        <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <a class="btn btn-warning mx-2" href="/dashboard/accident/{{ $accident->id }}/edit">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>
                    <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                    <div class="modal" tabindex="-1" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Accident</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to delete this accident?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                                    <form style="width: fit-content;" action="{{route('accident.destroy', $accident->id)}}" method="POST">
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
        {{ $accidents->links() }}
    </div>

</section>
@endsection