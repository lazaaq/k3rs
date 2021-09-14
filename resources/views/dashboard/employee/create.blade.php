@extends('layouts/dashboard')

@section('title', 'Employee | Create')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Employee | Create')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/employee">Employee</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('contents')
<section class="content pb-5 ">
    <form action="/dashboard/employee/create/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="manager_id" class="form-label">Manager Id</label>
            <input type="text" class="form-control" id="manager_id" name="manager_id" required>
        </div>
        <div class="mb-3">
            <label for="salary_id" class="form-label">Salary Id</label>
            <input type="text" class="form-control" id="salary_id" name="salary_id" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
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
        <div class="row">
            <a class="btn btn-secondary ml-3 mr-2" href="/dashboard/employee">Back</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>
@endsection

@section('js')
<script>

</script>
@endsection