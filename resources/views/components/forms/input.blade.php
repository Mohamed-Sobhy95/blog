@props(['name'])
<x-forms.field>
    <x-forms.label name="{{ $name }}"/>
    <input {{ $attributes->merge(['class'=>'border border-gray-200 rounded-xl p-2 w-full']) }} name="{{ $name }}" id="{{ $name }}" >
    <x-forms.error name="{{ $name }}"/>
</x-forms.field>
