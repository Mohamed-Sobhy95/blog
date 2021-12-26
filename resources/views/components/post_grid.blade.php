
@props(['posts'])
<x-featured_card :post="$posts[0]"/>
@if ($posts->count()>1)
    <div class="lg:grid lg:grid-cols-6">
    @foreach ($posts->skip(1) as $post)
        <x-post_card
        :post="$post"
            class="{{$loop->iteration>2?'col-span-2':'col-span-3'}}"
            />
    @endforeach

    </div>
@endif
