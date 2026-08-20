<div class="admin_payment_record_interface gradient_1 px-6 py-6">
    <h2 class="text-sm font-bold gradient_1 text-gray-100 rounded-md px-4 py-2 manrope text-right">Admin <span class="text-gray-300">></span> Payment Record</h2>

    <div class="mt-7 w-full h-max flex items-start justify-between flex-wrap gap-8">
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-max w-full h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Total Revenue</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between gap-10">
                <img src={{Vite::asset('resources/css/icon/total_revenue.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">&#8358; {{ $total_revenue }}</p>
            </div>
        </div>
    </div>

    <div class="mt-7 w-full h-max flex items-center justify-start gap-8">
        <div class="px-5 py-3 rounded-md bg-white text-gray-800 manrope text-sm w-max text-center cursor-pointer hover:bg-gray-300 transition-all duration-400" id="enable_view_payment_history_interface">
            <p class="flex items-center justify-center gap-2">View Payment History <img src="{{ Vite::asset('resources/css/icon/payment_history.png') }}" class="w-5 h-5" /></p>
        </div>
    </div>

    <div class="mt-7 w-full h-max gradient_1 lg:px-6 px-3 lg:py-6 py-3 rounded-md">
        <h2 class="manrope text-md text-right font-bold">Recent Transactions</h2>
        <div class="flex items-center justify-between lg:mt-7 mt-3 overflow-hidden">
            <livewire:livewire.recent_transaction />
        </div>
    </div>
</div>