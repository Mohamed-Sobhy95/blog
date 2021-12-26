@props(['name'])

<x-forms.field>
    <x-forms.label name="{{ $name }}"/>
    <textarea name="{{ $name }}" id="{{ $name }}"  rows="5" {{ $attributes(['class'=>'w-full rounded-xl p-2 border border-gray-300']) }}required>{{ $slot??old($name) }}</textarea>
    <x-forms.error name="{{ $name }}"/>

</x-forms.field>
