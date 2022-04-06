@extends('layouts.app')

@section('content')
    <h1>hello</h1>
    @if (count($items) > 0)

    @foreach ($items as $item)
        <div class="list-group mt-1">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$item->name}}</h5>
                <small>{{$item->created_at}}</small>
            </div>
            <p class="mb-1">{{$item->description}}</p>
            <small>And some small print.</small>
            </a>
        </div>
    @endforeach

    @else
        <p>No items found</p>
    @endif







@endsection
