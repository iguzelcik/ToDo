@extends('layouts.app')

@section('content')
    <a href="{{ route('todos.index') }}" type="button" class="btn btn-warning">Back</a>
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $todo->title }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $todo->description }}</h6>
    <p class="card-text">{{ $todo->category->name ?? 'No Category' }}</p>
   
    <a href="{{ route('todos.edit', $todo->id) }}" type="submit" class="btn btn-primary">Edit</a>
   
    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')   
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

  </div>
</div>

    @endsection