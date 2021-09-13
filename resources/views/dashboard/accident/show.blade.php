@extends('layouts/dashboard')

@section('title', 'Accident | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Accident | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/accident">Accident</a></li>
    <li class="breadcrumb-item active">Show</li>
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
        <img src="{{ $accident->image }}" alt="Image" width="80%" height="auto">
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $accident->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Employee Id</b>
        </div>
        <div class="col-10">
            {{ $accident->employee->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Employee Name</b>
        </div>
        <div class="col-10">
            {{ $accident->employee->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Image</b>
        </div>
        <div class="col-10">
            {{ $accident->image }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Time</b>
        </div>
        <div class="col-10">
            {{ $accident->time }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Location</b>
        </div>
        <div class="col-10">
            {{ $accident->location }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Victim Employee</b>
        </div>
        <div class="col-10">
            @if($victim_employees->count() > 0)
            <table class="table table-hover table-stripped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
                @foreach($victim_employees as $victim)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $victim->employee->name }}</td>
                    <td><a href="/dashboard/accident/{{$accident->id}}/ve/{{$victim->id}}" class="btn btn-success">Lihat</a></td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="text-success">Tidak Ada</div>
            @endif
        </div>
    </div>

    <div class="row py-2">
        <div class="col-2">
            <b>Victim Non Employee</b>
        </div>
        <div class="col-10">
            @if($victim_non_employees->count() > 0)
            <table class="table table-hover table-stripped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
                @foreach($victim_non_employees as $victim)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $victim->name }}</td>
                    <td><a href="/dashboard/accident/{{$accident->id}}/vne/{{$victim->id}}" class="btn btn-success">Lihat</a></td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="text-success">Tidak ada</div>
            @endif
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Witness</b>
        </div>
        <div class="col-10">
            @if($witnesses->count() > 0)
            <table class="table table-hover table-stripped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
                @foreach($witnesses as $witness)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $witness->name }}</td>
                    <td><a href="/dashboard/accident/{{$accident->id}}/w/{{$witness->id}}" class="btn btn-success">Lihat</a></td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="text-success">Tidak Ada</div>
            @endif
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $accident->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $accident->updated_at }}
        </div>
    </div>
    <div class="row mt-5">
        <a href="/dashboard/accident" class="btn btn-secondary">Back</a>
        <a class="btn btn-warning mx-2" href="/dashboard/accident/{{ $accident->id }}/edit">
            <ion-icon name="pencil-outline"></ion-icon>
            Edit
        </a>
        <button class="btn btn-danger" onclick="document.getElementById('modal').style.display='block'">
            <ion-icon name="trash-outline"></ion-icon>
            Delete
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
    </div>
</section>
@endsection