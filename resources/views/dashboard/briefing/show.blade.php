
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
            {{ $briefing->time }}
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
        <div class="col-10">
            <table class="table table-hover table-stripped">
                <tr>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Presence</th>
                </tr>
                @for($i = 0; $i < $employees->count(); $i++)
                <tr>
                    <td>{{ $employees[$i]->id }}</td>
                    <td>{{ $employees[$i]->name }}</td>
                    <td>@if( $briefing_presence[$i]->presence == '1') Hadir @else Tidak Hadir @endif</td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $briefing->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $briefing->updated_at }}
        </div>
    </div>
    
    <a href="/dashboard/briefing" class="btn btn-primary mt-5">Back</a>
</section>
@endsection

@section('js')
<script>

</script>
@endsection