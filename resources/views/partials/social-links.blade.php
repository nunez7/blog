<div class="buttons-social-media-share">
    <ul class="share-buttons">
        <li class="">
            <a href="https://www.facebook.com/sharer.php?u={{request()->fullUrl()}}&title={{$description}}" title="Compartir en Facebook" target="_blank">
                <img alt="Share on Facebook" src="{{asset('img/flat_web_icon_set/Facebook.png')}}"></a>
        </li>
        <li class="">
            <a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$description}}&via=Zendero&hashtags=Zendero" target="_blank" title="Tweet">
                <img alt="Tweet" src="{{asset('img/flat_web_icon_set/Twitter.png')}}"></a>
        </li>
        <li class="">
            <a href="https://plus.google.com/share?url={{request()->fullUrl()}}" target="_blank" title="Compartir en Google+">
                <img alt="Compartir en Google+" src="{{asset('img/flat_web_icon_set/Google+.png')}}"></a>
        </li>
        <li class="">
            <a href="http://pinterest.com/pin/create/button/?url={{request()->fullUrl()}}description={{$description}}" target="_blank" title="Pin it">
                <img alt="Pin it" src="{{asset('img/flat_web_icon_set/Pinterest.png')}}"></a>
        </li>
    </ul>
</div>