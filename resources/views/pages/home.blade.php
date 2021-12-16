@extends('layouts/index')

@section('content')
<section class="posts container">
    @if(isset($title))
    <h3>{{$title}}</h3>
    @endif
    @foreach ($posts as $post)
    <article class="post">
        @if ($post->photos->count()===1)
        @include('posts.photo')
        @elseif($post->photos->count()>1)
        @include('posts.carousel-preview')
        @elseif($post->iframe)
        {!! $post->iframe !!}
        @endif
        <div class="content-post">
            @include('posts.header')
            <h1>{{$post->title}}</h1>
            <div class="divider"></div>
            <p>{{$post->excerpt}}</p>
            <footer class="container-flex space-between">
                <div class="read-more">
                    <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">Leer más...</a>
                </div>
                @include('posts.tags')
            </footer>
        </div>
    </article>
    @endforeach
</section>
{{$posts->links()}}
@endsection