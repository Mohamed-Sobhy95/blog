@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4  text-sm">
        <div class="flex-shrink-0 ">
            <img src="https://i.pravatar.cc/?u={{ $comment->author->id }}" width="60px"  alt="" class="rounded-2xl">
        </div>
        <div>
            <header class="mb-4">
                <h3>{{ $comment->author->username }}</h3>
                <p class="text-xs text-gray-500">
                    posted
                    <time>
                            {{ $comment->post->created_at->format('Y-m-d / h:i:s') }}
                    </time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>

        </div>
    </article>

</x-panel>
