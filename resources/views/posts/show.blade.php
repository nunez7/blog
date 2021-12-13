@extends('layouts/index')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
<article class="post container">
    @if ($post->photos->count()===1)
    <figure><img src="{{url($post->photos->first()->url)}}" alt="" class="img-responsive"></figure>
    @elseif($post->photos->count()>1)
    @include('posts.carousel')
    @endif
    <div class="content-post">
        <header class="container-flex space-between">
            <div class="date">
                <span class="c-gris">{{$post->published_at->format('M d')}}</span>
            </div>
            <div class="post-category">
                <span class="category">{{$post->category->name}}</span>
            </div>
        </header>
        <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
            {!! $post->body !!}
        </div>
        <footer class="container-flex space-between">
            @include('partials.social-links', ['description'=> $post->title])
            <div class="tags container-flex">
                @foreach ($post->tags as $tag)
                <span class="tag c-gris">{{$tag->name}}</span>
                @endforeach
            </div>
        </footer>
        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
            @include('partials.disqus-script')
        </div><!-- .comments -->
    </div>
</article>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endpush
@push('scripts')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script>
    $('.carousel').carousel({
        interval: 2000
    })
</script>
@endpush