<div x-data="{show:false}" @click.away="show=false" class="relative">
    <div @click="show=!show">
        {{ $trigger }}
    </div>
    <div x-show="show" class="py-2 absolute z-50 bg-gray-100 w-full rounded-xl mt-3 max-h-40 overflow-auto"
        style="display: none">
        {{ $slot }}
    </div>
</div>
