@props(['name'])
@error($name)
    <span class="text-xs text-red-600">{{ $message }}</span>
@enderror
