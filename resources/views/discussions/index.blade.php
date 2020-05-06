@extends('layouts.app')

@section('content')

    @foreach ($discussions as $discussion)
        <div class="card">
            @include('partials.discussion-header')

            <div class="card-body">
                <div class="text-center">
                    <strong>
                        {{ $discussion->title }}
                    </strong>
                </div>
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
