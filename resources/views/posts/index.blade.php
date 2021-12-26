<x-layout>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
        <x-post_grid :posts="$posts" />
        {{ $posts->links() }}
        @else

        <div class="text-center">
            <p>there are no posts available</p>
        </div>

        @endif


    </main>
</x-layout>
