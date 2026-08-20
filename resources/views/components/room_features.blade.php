@props(['room_feature'])
<div class="flex items-start flex-wrap justify-start gap-2">
    <div>
        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->wifi == 1 ? 'checked' : ''  }} onclick="return false;" class="accent-[#a5793f]">Wi-Fi<span></span>
            </label>
        </div>

        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->complementary_breakfast == 1 ? 'checked' : ''  }} onclick="return false;" class="accent-[#a5793f]">Breakfast<span></span>
            </label>
        </div>

        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->pool_access == 1 ? 'checked' : ''  }}  onclick="return false;" class="accent-[#a5793f]">Pool Access<span></span>
            </label>
        </div>
    </div>
    <div>
        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->air_conditioning == 1 ? 'checked' : ''  }}  onclick="return false;" class="accent-[#a5793f]">Air Conditioning<span></span>
            </label>
        </div>

        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->daily_housekeeping == 1 ? 'checked' : ''  }}  onclick="return false;" class="accent-[#a5793f]">Daily Housekeeping<span></span>
            </label>
        </div>

        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->work_desk == 1 ? 'checked' : ''  }}  onclick="return false;" class="accent-[#a5793f]">Work Desk<span></span>
            </label>
        </div>
    </div>
    <div>
        <div class="flex-row justify-center mt-2">
            <label class="flex gap-2 manrope text-sm text-gray-300">
                <input type="checkbox" {{ $room_feature->smart_tv == 1 ? 'checked' : ''  }}  onclick="return false;" class="accent-[#a5793f]">Smart TV<span></span>
            </label>
        </div>
    </div>
</div>