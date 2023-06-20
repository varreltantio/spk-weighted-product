@extends('layouts.auth')

@section('title', 'Login')
@section('container')
<div class="container py-5 h-100">
  <div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-8 col-lg-7 col-xl-6">

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissble fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissble fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image" />
    </div>
    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <div class="mb-5">
        <i class="fa-solid fa-wheat-awn fa-2x" style="color: #2d31fa"></i>
        <span class="h1 fw-bold mb-0">Laundry Cucikan</span>
      </div>
      <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf
        <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px">Log in</h3>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label fw-bold" for="email">Email address</label>
          <input type="email" name="email" id="email" class="form-control form-control-lg fs-6 @error('email') is-invalid @enderror" placeholder="Masukkan Email..." required value="{{ old('email') }}" />
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label fw-bold" for="password">Password</label>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control form-control-lg fs-6" placeholder="Masukkan Password..." required />
            <span class="input-group-text">
              <i class="fa-solid fa-eye" id="toggle-password" style="cursor: pointer" toggle="#password"></i>
            </span>
          </div>
        </div>
        <!-- Submit button -->
        <div class="d-grid gap-2 pt-4">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
