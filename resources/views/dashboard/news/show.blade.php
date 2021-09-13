@extends('layouts/dashboard')

@section('title', 'News')

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

@section('page-name', 'News')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/news">News</a></li>
    <li class="breadcrumb-item active">Single News</li>
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
        <h1 class="mb-3">{{ $news->title }}</h1>
        <div class="row">
            <b>
                <ion-icon name="person-outline"></ion-icon>{{ $news->author }}
            </b>
            <b class="ml-auto">{{ $news->updated_at }}</b>
        </div>
        <div class="row justify-content-center mt-5">
            <img src="{{ $news->image }}" alt="Gambar" width="80%" height="auto">
        </div>
        <div class="row">
            <p class="mt-3">{{ $news->body }}</p>
        </div>
        <div class="row">
            <a href="/dashboard/news" class="btn btn-secondary mr-2">Back</a>
            <a class="btn btn-warning mr-2" href="/dashboard/news/{{ $news->id }}/edit">
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
                            <h5 class="modal-title">Delete News</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete this news?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                            <form style="width: fit-content;" action="{{route('news.destroy', $news->id)}}" method="POST">
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