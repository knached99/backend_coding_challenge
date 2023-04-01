@extends('layouts.app')
<x-navbar />
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark m-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Hire Employee
</button>

@if (session('emp_hire_err'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('emp_hire_err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('employee_hired'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('employee_hired') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('emp_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('emp_deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('emp_delete_err'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('emp_delete_err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<x-dashboard.tables :users="$users" />



<x-dashboard.modal />
