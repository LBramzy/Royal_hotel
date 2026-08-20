<x-app>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        <p class="mb-4 text-gray-600">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
        </p>

        @if (session('message'))
            <p class="mb-4 text-sm text-green-600">{{ session('message') }}</p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                Resend Verification Email
            </button>
        </form>
    </div>
</x-app>