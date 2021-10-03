@extends('layouts/dashboard')

@section('title', 'Manager | Edit')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Manager | Edit')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/manager">Manager</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <div class="container">
        <form action="{{ route('manager.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $manager->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $manager->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="salary_id" class="form-label">Gaji</label>
                <select class="custom-select form-control-border" name="salary_id" id="salary_id">
                    @foreach($salaries as $salary)
                    <option value="{{$salary->id}}" @if($salary->id == $manager->salary->id) selected @endif>Rp{{ number_format($salary->salary_amount, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $manager->email }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" required>{{ $manager->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="birth" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="birth" name="birth" value="{{ $manager->birth }}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" @if($manager->gender == 'L') checked @endif value="L">
                    <label class="form-check-label" for="gender1">
                        Laki Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" @if($manager->gender == 'P') checked @endif value="P">
                    <label class="form-check-label" for="gender2">
                        Perempuan
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection