<div class="gallery-photos masonry">
    @foreach ($post->photos->take(4) as $photo)
    <figure class="gallery-image">
        @if($loop->iteration===4)
        <div class="overlay">{{$post->photos->count()}}</div>
        @endif
        <img src="{{url('storage/'.$post->photos->first()->url)}}" class="img-responsive" alt="">
    </figure>
    @endforeach
</div>