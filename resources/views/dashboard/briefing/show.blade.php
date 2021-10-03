@extends('layouts/dashboard')

@section('title', 'Briefing | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Briefing | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/apar">Briefing</a></li>
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
    <div class="row py-2">
        <div class="col-2">
            <b>Id</b>
        </div>
        <div class="col-10">
            {{ $briefing->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Time</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($briefing->time, 2, ',', '.')->format('d F Y') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Result</b>
        </div>
        <div class="col-10">
            {{ $briefing->result }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Presence</b>
        </div>
        @if(count($briefing_presence) != 0)
        <div class="col-10">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Id Employee</th>
                    <th>Nama Employee</th>
                    <th>Lihat Profil</th>
                </tr>
                @for($i = 0; $i < $briefing_presence->count(); $i++)
                    <tr>
                        <td>{{ $briefing_presence[$i]->employee->id }}</td>
                        <td>{{ $briefing_presence[$i]->employee->name }}</td>
                        <td><a href="/dashboard/employee/{{$briefing_presence[$i]->employee->id}}" class="btn btn-success">Lihat</a></td>
                    </tr>
                    @endfor
            </table>
        </div>
        @else
        <div class="text-success">
            Tidak ada
        </div>
        @endif
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($briefing->created_at, 2, ',', '.')->format('d F Y - h:i:s') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ Carbon\Carbon::parse($briefing->updated_at, 2, ',', '.')->format('d F Y - h:i:s') }}
        </div>
    </div>

    <a href="/dashboard/briefing" class="btn btn-secondary mt-5">Back</a>
</section>
@endsection

@section('js')
<script>

</script>
@endsection