@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">

            @forelse($articles as $article)
                <div id="content">
                    <div class="" style="margin-top: 1.5rem;margin-bottom: 0.5rem">
                        <h2><a href="{{$article->path()}}">{{ $article->title  }}</a></h2>
                    </div>

                    <p><img src="{{asset('images/banner.jpg')}}" alt="" class="image image-full" /> </p>
                    {!! $article->excerpt !!}
                </div>

            @empty
                <p>No relevant articles yet;</p>
            @endforelse

        </div>
    </div>
@endsection
