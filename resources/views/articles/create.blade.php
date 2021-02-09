@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection


@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-6 pb-3">New Article</h1>

            <form action="/articles" method="post">
                @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
                        {{-- {{$errors->has('title') ? 'is-danger' : ''}}--}}
                        <input type="text" value="{{old('title')}}" class="input @error('title') is-danger @enderror" name="title" id="title">

                        {{-- @if($errors->has('title'))--}}
                        {{-- <p class="help is-danger">{{$errors->first('title')}}</p>--}}
                        {{-- @endif--}}
                        @error('title')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror

                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" id="excerpt" name="excerpt">
                             {{old('excerpt')}}
                        </textarea>

                        @error('excerpt')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="title" class="body">Body</label>
                    <div class="control">
                        <textarea name="body" id="body" cols="30" rows="10" class="textarea @error('excerpt') is-danger @enderror">
                            {{old('body')}}
                        </textarea>
                        @error('excerpt')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="title" class="body">Tags</label>
                    <div class="control select is-multiple">
                        <select name="tags[]" id="" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                        @error('tags')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
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
