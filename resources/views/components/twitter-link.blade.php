@if(config('services.twitter.handle'))
<a
    href="{{ Str::of('https://x.com/')->append(config('services.twitter.handle')) }}"
    class="text-amber-950 hover:text-amber-800"
    target="_blank"
>
    <x-icon-twitter-x class="w-6"/>
</a>
 @endif
