@extends('layouts.app')
<x-navbar />
<div class="container shadow-lg rounded p-5 m-5">
    <form method="POST" action="{{ route('admin.user.edit', ['id' => $user->id]) }}">
        @method('PUT')
        @csrf

        @if (session('user_updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('user_updated') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row m-3">
            <input name="employee_id"
                class="form-control bg-light p-3 shadow-md border-1  @error('employee_id') is-invalid @enderror"
                placeholder="Employee ID (format: XY-1234)" value="{{ "$user->employee_id" }}">

            @error('employee_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="row m-3">
            <input name="name"
                class="form-control bg-light p-3 shadow-md border-1  @error('name') is-invalid @enderror"
                placeholder="Employee Name " value="{{ "$user->name" }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="row m-3">
            <input name="email"
                class="form-control bg-light p-3 shadow-md border-1  @error('email') is-invalid @enderror"
                placeholder="Employee Email" value="{{ "$user->email" }}">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="row m-3">
            <button class="btn btn-dark text-white">Update</button>
        </div>
    </form>
</div>
