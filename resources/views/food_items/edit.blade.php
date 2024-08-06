@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Food Item</h1>
    <form action="{{ route('food_items.update', $foodItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $foodItem->name }}">
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $foodItem->image_url }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $foodItem->price }}">
        </div>

        <div class="mb-3">
            <label for="store_name" class="form-label">Store Name</label>
            <input type="text" class="form-control" id="store_name" name="store_name" value="{{ $foodItem->store_name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
