@extends('layouts.app')

@section('content')
   <a href="{{ route('todos.index') }}" type="button" class="btn btn-warning">Back</a>

   @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
       
   
    <form action="{{ route('todos.store')}}" method="POST" style="display:inline;">
 
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid
            @enderror" id="description" name="description">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date">
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority">
                @foreach ($priorities as $priority )
                    <option value="{{ $priority->value }}">{{ $priority->label() }}</option>
                    
                @endforeach
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input @error('is_starred') is-invalid @enderror" id="is_starred" name="is_starred">
            <label class="form-check-label" for="is_starred">Starred</label>
            @error('is_starred')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
              @foreach ($statuses as $status )
                <option value="{{ $status->value }}">{{ $status->label() }}</option>
                  
              @endforeach
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
       
       
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>

  </div>
</div>
@endsection