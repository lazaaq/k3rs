@extends('layouts/dashboard')

@section('title', 'APAR | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'APAR | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/apar">APAR</a></li>
    <li class="breadcrumb-item active">Show</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 container">
    <div class="row justify-content-center my-5">
        <img src="{{ $apar->image }}" alt="Image" width="80%" height="auto">
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $apar->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Image</b>
        </div>
        <div class="col-10">
            {{ $apar->image }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Time</b>
        </div>
        <div class="col-10">
            {{ $apar->time }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Location</b>
        </div>
        <div class="col-10">
            {{ $apar->location }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Code</b>
        </div>
        <div class="col-10">
            {{ $apar->code }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Expired</b>
        </div>
        <div class="col-10">
            {{ $apar->expired }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Condition</b>
        </div>
        <div class="col-10">
            {{ $apar->condition }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Detail</b>
        </div>
        <div class="col-10">
            {{ $apar->detail }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $apar->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $apar->updated_at }}
        </div>
    </div>
    <div class="row mt-5">
        <a href="/dashboard/apar" class="btn btn-secondary">Back</a>
        <a class="btn btn-warning mx-2" href="/dashboard/apar/{{ $apar->id }}/edit">
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
                        <h5 class="modal-title">Delete Apar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete this apar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                        <form style="width: fit-content;" action="{{route('apar.destroy', $apar->id)}}" method="POST">
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