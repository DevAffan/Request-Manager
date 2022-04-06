@extends('layouts.app')
@section('content')
    <h1>Edit Your Item</h1>
<form action="{{route('request.update' , $item->id)}}" method="post" class="mt-3">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Type Item Name Here" value="{{$item->name}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" placeholder="description" >{{$item->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Item</button>
</form>

@endsection
