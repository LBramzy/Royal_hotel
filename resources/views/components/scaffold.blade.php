<x-app>
    @props(['auth_type'])
    <div class="flex items-center justify-center w-full min-h-screen gradient_1 scaffold {{ $auth_type }}">
        {{ $slot }}
    </div>
</x-app>