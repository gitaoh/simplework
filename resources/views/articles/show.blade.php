@extends('layout')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <div class="is-flex is-align-items-center is-justify-items-space-between is-fullwidth">
                        <div><h1 class="heading has-text-weight-bold is-size-6">{{ $article->title  }}</h1></div>
                        <div>
                            <a class="button has-background-info has-text-white" href="/articles/{{$article->id}}/edit">Edit</a>
                        </div>
                    </div>
                    <span class="byline">{{$article->exerpt}}</span>
                </div>
                <p><img src="{{asset('images/banner.jpg')}}" alt="" class="image image-full" /> </p>
                <article>{{$article->body}}</article>
            </div>
        </div>
    </div>
@endsection
