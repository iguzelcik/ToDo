@extends('layouts.app')

@section('content')
   <a href="{{ route('categories.index') }}" type="button" class="btn btn-warning">Back</a>

   @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
       
   
    <form action="{{ route('categories.store')}}" method="POST" style="display:inline;">
 
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control @error('color') is-invalid
                
            @enderror" id="color" name="color">
            @error('color')
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
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>

  </div>
</div>
@endsection