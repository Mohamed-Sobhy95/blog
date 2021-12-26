<x-forms.field {{ $attributes->merge(['class'=>'flex justify-end mb-2']) }}>
    <button type="submit" class="bg-blue-400 text-white text-sm font-semibold uppercase hover:bg-blue-700 rounded-xl mt-3 px-8 py-2">{{ $slot }}</button>
</x-forms.field>
