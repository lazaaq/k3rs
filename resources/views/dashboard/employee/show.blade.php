@extends('layouts/dashboard')

@section('title', 'Employee | Show')

@section('css')
<style>

</style>
@endsection

@section('page-name', 'Employee | Show')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/employee">Employee</a></li>
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
            {{ $employee->id }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Nama</b>
        </div>
        <div class="col-10">
            {{ $employee->name }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Email</b>
        </div>
        <div class="col-10">
            {{ $employee->email }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Address</b>
        </div>
        <div class="col-10">
            {{ $employee->address }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Birth</b>
        </div>
        <div class="col-10">
            {{ $employee->birth }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Gender</b>
        </div>
        <div class="col-10">
            {{ $employee->gender }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Manager Name</b>
        </div>
        <div class="col-10">
            <a href="/dashboard/manager/{{ $employee->manager->id }}" class="btn btn-info">{{ $employee->manager->name }}</a>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Salary</b>
        </div>
        <div class="col-10">
            Rp{{ number_format($employee->salary->salary_amount, 0, ',', '.') }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Created At</b>
        </div>
        <div class="col-10">
            {{ $employee->created_at }}
        </div>
    </div>
    <div class="row py-2">
        <div class="col-2">
            <b>Updated At</b>
        </div>
        <div class="col-10">
            {{ $employee->updated_at }}
        </div>
    </div>
    <div class="row mt-5">
        <a href="/dashboard/employee" class="btn btn-secondary">Back</a>
        <a class="btn btn-warning mx-2" href="/dashboard/employee/{{$employee->id}}/edit">
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
                        <h5 class="modal-title">Delete Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal').style.display='none'">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete this Employee?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal').style.display='none'">Cancel</button>
                        <form style="width: fit-content;" action="{{route('employee.destroy', $employee->id)}}" method="POST">
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

@section('js')
<script>

</script>
@endsection