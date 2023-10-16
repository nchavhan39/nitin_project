@extends('layouts.app')

@section('content')
<h1>Create Category</h1>
<form action="{{ route('store-category') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Category Name:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="parent_id">Parent Category:</label>
        <select name="parent_id" class="form-control">
            <option value="null">None</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Category</button>
</form>
@endsection