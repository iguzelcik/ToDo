@extends('layouts.app')

@section('content')
<h1>Register</h1>

<form method="POST" action="{{ route('register.store') }}">
    @csrf
    <div class="form-group">
    <label for="name">Name</label>
    <input name="name" type="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{ old('name') }}" required autofocus>
    @error('name')
        <div>{{ $message }}</div>
    @enderror
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
    @error('email')
        <div>{{ $message }}</div>
    @enderror
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Password"value="{{ old('email') }}" required autofocus>
      @error('password')
            <div>{{ $message }}</div>
      @enderror
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
  <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</form>




@endsection