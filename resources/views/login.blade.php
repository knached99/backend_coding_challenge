@extends('layouts.app')
<x-navbar/>
<main class="form-signin">
  <form method="POST" action="{{route('login')}}">
  @csrf
    <h1 class="h3 mb-3 fw-bold">Signin to continue</h1>
 
 @if(session('AUTH_ERROR'))
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('AUTH_ERROR')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 @endif

<div class="form-floating">
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}">
    <label for="floatingInput">Email address</label>
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-floating">
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
    <label for="floatingPassword">Password</label>
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

  </form>
</main>

  
  
  
