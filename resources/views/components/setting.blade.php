@props(['heading'])
<section class="max-w-4xl mx-auto py-8">
        <h2 class="font-bold text-xl my-6 pb-3 border-b">
            {{ $heading }}
        </h2>

        <div class="flex mt-6 ">
            <aside class="w-48 mt-6 flex-shrink-0">
                <h4 class="font-semibold mb-4 ">Links</h4>
                <ul class="space-y-4">
                    <li >
                        <a href="/admin/posts" class="{{ request()->is('admin/posts')?'text-blue-600':'' }}">All posts</a>
                    </li>
                    <li >
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create')?'text-blue-600':'' }}">New Post</a>
                    </li>

                    <li >
                        <a href="/admin/post/create">others</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1 ">
                <x-panel class=" mt-3">
                    {{ $slot }}
                </x-panel>
            </main>
        </div>

    </section>
