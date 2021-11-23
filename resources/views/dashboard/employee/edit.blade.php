@extends('layouts/dashboard')

@section('title', 'Pegawai | Edit')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Pegawai | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/employee">Pegawai</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                Edit Employee
            </div>
            <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $employee->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group mb-3">
                        <label for="manager_id" class="form-label">Manager</label>
                        <select class="custom-select form-control-border" name="manager_id" id="manager_id">
                            @foreach($managers as $manager)
                            <option value="{{$manager->id}}" @if($manager->id == $employee->manager->id) selected @endif>{{ $manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="salary_id" class="form-label">Gaji</label>
                        <select class="custom-select form-control-border" name="salary_id" id="salary_id">
                            @foreach($salaries as $salary)
                            <option value="{{$salary->id}}" @if($salary->id == $employee->salary->id) selected @endif>
                                Rp{{ number_format($salary->salary_amount, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required placeholder="Alamat Email">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Rumah</label>
                        <textarea class="form-control" id="address" name="address" rows="5" required placeholder="Alamat Rumah">{{ $employee->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="birth" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="birth" name="birth" value="{{ $employee->birth }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
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
                        <a class="btn btn-secondary ml-3 mr-2" href="/dashboard/employee/{{ $employee->id }}">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection