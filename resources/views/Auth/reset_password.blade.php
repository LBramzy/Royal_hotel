<x-app>

    <div class="w-full min-h-screen relative px-6 py-6 contact_section">
        <livewire:livewire.auth.reset-password :token="$token" :email="$email" />
    </div>
    
</x-app>