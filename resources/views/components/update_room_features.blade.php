@props(['room_feature'])
<div class="w-1/2">

    <label for="wifi">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="wifi" value="0" />
            <input type="checkbox" id="wifi" name="wifi" value="1" {{ $room_feature->wifi =='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Wifi</span>
        </div>
    </label>
    <label for="smart_tv">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="smart_tv" value="0" />
            <input type="checkbox" id="smart_tv" name="smart_tv" value="1" {{ $room_feature->smart_tv=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Smart<span class="text-transparent">_</span>TV</span>
        </div>
    </label>

    <label for="air_conditioning">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="air_conditioning" value="0" />
            <input type="checkbox" id="air_conditioning" name="air_conditioning" value="1" {{ $room_feature->air_conditioning=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Air<span class="text-transparent">_</span>Conditioning</span>
        </div>
    </label>

    <label for="complementary_breakfast">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="complementary_breakfast" value="0" />
            <input type="checkbox" id="complementary_breakfast" name="complementary_breakfast" value="1" {{ $room_feature->complementary_breakfast=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Breakfast</span>
        </div>
    </label>

</div>

<div class="w-1/2">
                            
    <label for="daily_housekeeping">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="daily_housekeeping" value="0" />
            <input type="checkbox" id="daily_housekeeping" name="daily_housekeeping" value="1" {{ $room_feature->daily_housekeeping=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Daily<span class="text-transparent">_</span>Housekeeping</span>
        </div>
    </label>

    <label for="work_desk">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="work_desk" value="0" />
            <input type="checkbox" id="work_desk" name="work_desk" value="1" {{ $room_feature->work_desk=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Work<span class="text-transparent">_</span>Desk</span>
        </div>
    </label>

        <label for="room_service">
        <div class="flex gap-2 w-max">
            <input type="hidden" name="room_service" value="0" />
            <input type="checkbox" id="room_service" name="room_service" value="1" {{ $room_feature->room_service=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">24<span>/</span>7<span class="text-transparent">_</span>Room<span class="text-transparent">_</span>Service</span>
        </div>
    </label>

    <label for="pool_access">
        <div class="flex items-start gap-2 w-max">
            <input type="hidden" name="pool_access" value="0" />
            <input type="checkbox" id="pool_access" name="pool_access" value="1" {{ $room_feature->pool_access=='1'?'checked':'' }} class="accent-[#a5793f]"/>
            <span class="text-gray-300 text-sm manrope">Pool<span class="text-transparent">_</span>Access</span>
        </div>
    </label>

</div>