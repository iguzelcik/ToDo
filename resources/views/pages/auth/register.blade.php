@extends('layouts.app')

@section('content')
<h1>Register</h1>
<form method="POST" action="{{ route('register.store') }}">
    @csrf
   <div class="mb-3">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>
   
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>     

@endsection