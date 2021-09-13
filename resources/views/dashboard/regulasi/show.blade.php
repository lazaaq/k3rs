@extends('layouts/dashboard')

@section('title', 'Regulasi')

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

@section('page-name', 'Regulasi')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/regulasi">Regulasi</a></li>
    <li class="breadcrumb-item active">Show</li>
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
    <div class="container">
        <div class="row py-2">
            <div class="col-2">
                <b>Id</b>
            </div>
            <div class="col-10">
                {{ $regulasi->id }}
            </div>
        </div>
        <div class="row py-2">
            <div class="col-2">
                <b>Title</b>
            </div>
            <div class="col-10">
                {{ $regulasi->title }}
            </div>
        </div>
        <div class="row py-2">
            <div class="col-2">
                <b>Description</b>
            </div>
            <div class="col-10">
                {{ $regulasi->description }}
            </div>
        </div>
        <div class="row py-2">
            <div class="col-2">
                <b>File</b>
            </div>
            <div class="col-10">
                {{ $regulasi->file }}
            </div>
        </div>
        <div class="row">
            <a href="/dashboard/regulasi" class="btn btn-secondary mr-2">Back</a>
            <a href="{{ $regulasi->file }}" class="btn btn-info">View File</a>
            <a class="btn btn-warning mx-2" href="/dashboard/regulasi/{{ $regulasi->id }}/edit">
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
                            <h5 class="modal-title">Delete Regulasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete this Regulasi?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                            <form style="width: fit-content;" action="{{route('regulasi.destroy', $regulasi->id)}}" method="POST">
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