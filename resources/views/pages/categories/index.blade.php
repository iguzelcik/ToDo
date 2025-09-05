@extends('layouts.app')

@section('content')
  <a href="{{ route('categories.create') }}" type="button" class="btn btn-info">Create</a>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Color</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
        
   
    <tr>
      <th scope="row">{{ $category->id}}</th>
      <td><a href="{{ route('categories.show',$category->id) }}">{{ $category->name}}</a></td>
      <td>{{ $category->color}}</td>
      <td>{{ $category->description}}</td>
    </tr>
     @endforeach
  </tbody>
</table>
{{ $categories->links('pagination::bootstrap-5') }}
    
@endsection