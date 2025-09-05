@extends('layouts.app')

@section('content')
    <a href="{{ route('categories.index') }}" type="button" class="btn btn-warning">Back</a>
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $category->name }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $category->color }}</h6>
    <p class="card-text">{{ $category->description }}</p>
   
    <a href="{{ route('categories.edit', $category->id) }}"type="submit" class="btn btn-primary">Edit</a>
   
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')   
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

  </div>
</div>
<hr>
<h3>Todos in this Category</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>  
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Status</th>
      <th scope="col">Priority</th>
      <th scope="col">Due Date</th>
      <th scope="col">Completed At</th>
      <th scope="col">Starred</th>
      <th scope="col">Check</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($category->todos as $todo)
    <tr>
      <th scope="row">{{ $todo->id}}</th>
      <td><a href="{{ route('todos.show',$todo->id) }}">{{ $todo->title}}</a></td>
      <td>{{ $todo->category->name}}</td>
      <td>{{ \App\Enums\TodoStatusEnum::from($todo->status)->label()}}</td>
      <td>{{ \App\Enums\TodoPriorityEnum::from($todo->priority)->label()}}</td>
      <td>{{ $todo->due_date}}</td>
      <td>{{ $todo->completed_at}}</td>
      <td>{{ $todo->is_starred ? 'Yes' : 'No' }}</td> 
     <td>
        <form action="{{ route('todos.check', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')  
            <input type="checkbox" name="check" onchange="this.form.submit()" {{ $todo->status === 'completed' ? 'checked' : '' }}>
        </form>
    </tr>
     @endforeach
  </tbody>
</table>  

    @endsection