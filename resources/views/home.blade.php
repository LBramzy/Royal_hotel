<x-app>

    {{--  Hero Section  --}}
    <x-hero_layout>
        <x-slot name="title">
            Royal Hotel
        </x-slot>

        <x-slot name="description">
            Experience the finest hospitality and create unforgettable memories.
        </x-slot>
    </x-hero_layout>
    {{--  Hero Section  --}}

    {{--  Section section  --}}
    <x-services_page>
        <x-slot name="title">
            Hello
        </x-slot>
    </x-services_page>
    {{--  Service section  --}}

    {{--  About section  --}}
    <x-about_page></x-about_page>
    {{--  About section  --}}

    {{--  Contact section  --}}
    <x-contact_page></x-contact_page>
    {{--  Contact section  --}}

    {{--  Footer section  --}}
    <x-footer />
    {{--  Footer section  --}}

    
    {{--  Script  --}}
    <div>
        @include('scripts.home_script')
    </div>
    {{--  Script  --}}
</x-app>


