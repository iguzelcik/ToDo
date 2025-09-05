@extends('layouts.app')
@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login.store') }}">
    @csrf
    <div class="mb-3">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
          @error('email')
                <div>{{ $message }}</div>
          @enderror         
    <div>
    <div class="mb-3">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" required>
          @error('password')
                <div>{{ $message }}</div>
          @enderror         
    <div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
@endsection