<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-400 rounded-2xl p-4">
            <h1 class="font-bold text-center text-lg">Register!</h1>

            <form action="/register" method="POST" class="mt-10">
                @csrf
                <x-forms.input name="name" required/>
                <x-forms.input name="username" required/>
                <x-forms.input name="email" type="email" autocomplete="username" required/>
                <x-forms.input name="password" type="password" autocomplete="new-password" required/>

                <x-forms.button>submit</x-forms.button>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <ol class="px-3">
                            <li class="text-red-600 text-xs list-disc">{{ $error }}</li>
                        </ol>
                    @endforeach

                @endif
            </form>


        </main>


    </section>
</x-layout>
