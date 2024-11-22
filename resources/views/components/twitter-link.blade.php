@if(config('services.twitter.handle'))
<a
    {{ $attributes->merge(['class' => 'text-amber-950 hover:text-amber-800 dark:text-stone-400 dark:hover:text-stone-200']) }}
    href="{{ Str::of('https://x.com/')->append(config('services.twitter.handle')) }}"
    target="_blank"
>
    <x-icon-twitter-x class="w-6"/>
</a>
 @endif
