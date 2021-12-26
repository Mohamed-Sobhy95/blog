
@auth
    <x-panel>

        <form action="/posts/{{ $post->slug }}/comments" method="post" >
            @csrf
            <header class="flex space-x-4 items-center">
                <img src="https://i.pravatar.cc/?u={{auth()->user()?->id }}" width="60px"  alt="" class="rounded-full">
                <h2 class="font-semibold ">want to participate</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" id="body"  rows="5" placeholder="think of something !"class="p-3 w-full text-xs focus:outline-none focus:ring border border-gray-200 rounded-xl" required></textarea>
            </div>
            <x-forms.button class="mt-4 border-t border-gray-300">post</x-forms.button>

            @error('body')
                <p class="text-xs text-red-600">{{ $message }}</p>
            @enderror
        </form>

    </x-panel>
@else
    <x-panel>
        <p>
            please <a href="/login" class="hover:underline">Log in</a> or <a href="/register" class="hover:underline"> register</a> to comment
        </p>
    </x-panel>
@endauth
