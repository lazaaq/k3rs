@extends('layouts/dashboard')

@section('title', 'Manager | Buat')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Manager | Buat')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/manager">Manager</a></li>
    <li class="breadcrumb-item active">Buat</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <div class="container">
        <form action="/dashboard/manager/create/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="salary_id" class="form-label">Gaji</label>
                <select class="custom-select form-control-border" name="salary_id" id="salary_id">
                    <option selected>Pilih Gaji</option>
                    @foreach($salaries as $salary)
                    <option value="{{$salary->id}}">Rp{{ number_format($salary->salary_amount, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="birth" class="form-label">Birth</label>
                <input type="date" class="form-control" id="birth" name="birth" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="L">
                    <label class="form-check-label" for="gender1">
                        Laki Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="P">
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