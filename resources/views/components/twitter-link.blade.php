@if(config('services.twitter.handle'))
<a
    href="{{ Str::of('https://x.com/')->append(config('services.twitter.handle')) }}"
    class="p-8 text-orange-700 hover:text-orange-500"
    target="_blank"
>
    <x-icon-twitter-x class="w-6"/>
</a>
 @endif
