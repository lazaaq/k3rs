@extends('layouts/dashboard')

@section('title', 'K3RS | Employee')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Employee')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Employee</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $employee->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="5" required>{{ $employee->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="birth" class="form-label">Birth</label>
            <input type="date" class="form-control" id="birth" name="birth" value="{{ $employee->birth }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="L" @if($employee->gender == 'L') checked @endif>
                <label class="form-check-label" for="gender1">
                    Laki Laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="P" @if($employee->gender == 'P') checked @endif>
                <label class="form-check-label" for="gender2">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-secondary ml-3 mr-2" href="/dashboard/employee/{{ $employee->id }}">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>
@endsection

@section('js')
<script>

</script>
@endsection