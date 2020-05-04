@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('discussions.create')}}" class="btn btn-success">Add Discussions</a>
    </div>

    @foreach ($discussions as $discussion)
        <div class="card">
            <div class="card-header">
                {{$discussion->title}}

            </div>

            <div class="card-body">
                {!! $discussion->content !!}
            </div>
        </div>
    @endforeach

    {{$discussions->links()}}
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
