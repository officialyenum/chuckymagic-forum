@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <strong>
                    {{ $discussion->title }}
                </strong>
            </div>

            <hr>

            {!! $discussion->content !!}
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">
            Add a Reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="reply" type="hidden" name="reply">
                        <trix-editor input="reply"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-success my-2">Add Reply</button>
                </form>
            @else
            <a href="{{route('login')}}" class="btn btn-info text-white"> Sign in to Add a reply</a>
            @endauth
        </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
