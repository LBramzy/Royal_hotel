@if ($paginator->hasPages())
    <div class="w-full flex items-center justify-between">
        <div class="md:block hidden">
            <p class="manrope text-sm text-gray-300">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            </p>
        </div>

        <div>
            <span class="inline-flex gap-2 items-center">
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-1 rounded-full bg-gray-700 text-gray-500 manrope text-sm cursor-not-allowed">Prev</span>
                @else
                    <button type="button" wire:click="previousPage" wire:loading.attr="disabled" class="px-3 py-1 rounded-full bg-gray-100 text-gray-800 manrope text-sm hover:bg-[#a5793f] hover:text-gray-100 transition">Prev</button>
                @endif

                {{-- Page numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-3 py-1 text-gray-400 manrope text-sm">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-3 py-1 rounded-full bg-[#a5793f] text-gray-100 manrope text-sm">{{ $page }}</span>
                            @else
                                <button type="button" wire:click="gotoPage({{ $page }})" class="px-3 py-1 rounded-full bg-gray-100 text-gray-800 manrope text-sm hover:bg-[#a5793f] hover:text-gray-100 transition">{{ $page }}</button>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <button type="button" wire:click="nextPage" wire:loading.attr="disabled" class="px-3 py-1 rounded-full bg-gray-100 text-gray-800 manrope text-sm hover:bg-[#a5793f] hover:text-gray-100 transition">Next</button>
                @else
                    <span class="px-3 py-1 rounded-full bg-gray-700 text-gray-500 manrope text-sm cursor-not-allowed">Next</span>
                @endif
            </span>
        </div>
    </div>
@endif
