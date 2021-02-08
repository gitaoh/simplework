@extends('layout')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection


@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-6 pb-3">Update Article</h1>

            <form action="/articles/{{$article->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
                        <input type="text" class="input" name="title" value="{{$article->title}}" id="title" required aria-required="true">
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea class="textarea" id="excerpt" name="excerpt">{{$article->excerpt}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="title" class="body">Body</label>
                    <div class="control">
                        <textarea name="body" id="body" cols="30" rows="10" class="textarea">{{$article->body}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="submit" value="submit" class="button is-link">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
