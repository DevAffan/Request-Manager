@extends('layouts.app')
@section('content')

<form action="{{route('request.store')}}" method="post" class="mt-3">
@csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Type Item Name Here">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" placeholder="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Item</button>
</form>

@endsection
