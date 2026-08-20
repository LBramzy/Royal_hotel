@props(['image'])
<div>
    <div class="flex items-center justify-center w-17 h-17 rounded-md">
        <button type="button" class="rounded-md focus:border-2 focus:border-[#a5793f] hover:cursor-pointer" data-id="{{ asset('storage/'.$image->image_path) }}" onclick="view_image(this)">
            <img src="{{ asset('storage/'.$image->image_path) }}" class="w-16 h-16 rounded-sm" />
        </button>
    </div>
</div>
