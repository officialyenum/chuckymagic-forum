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
            @if ($discussion->bestReply)
                <div class="card bg-success text-white my-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{Gravatar::src($discussion->bestReply->owner->email)}}" width="40" height="40" style="border-radius: 50%"  alt="">
                                <span class="pl-2">{{ $discussion->bestReply->owner->name }}</span>
                            </div>
                            <div>
                                Best Reply
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $discussion->bestReply->content !!}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @foreach ($discussion->replies()->paginate(3) as $reply)
        <div class="card my-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{Gravatar::src($reply->owner->email)}}" width="40" height="40" style="border-radius: 50%"  alt="">
                        <span class="pl-2">{{ $reply->owner->name }}</span>
                    </div>
                    <div>
                        @auth
                            @if (auth()->user()->id === $discussion->user_id)
                                <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info">Mark as best Reply</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach

    {{ $discussion->replies()->paginate(3)->links() }}

    <div class="card my-4">
        <div class="card-header">
            Add a Reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor>
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
