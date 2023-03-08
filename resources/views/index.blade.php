<x-app-layout title="njk">
    <div class="flex-1 flex justify-center py-12">
        <div class="flex items-center space-x-4">
            <a href="{{ route('register') }}" class="px-6 py-2 bg-[#9381FF] text-white rounded-md font-semibold">
                {{ __('Create an event') }}
            </a>
            <a href="#" class="px-6 py-2 bg-[#F8F7FF] text-[#9381FF] rounded-md font-semibold">
                {{ __('Discover events') }}
            </a>
        </div>
    </div>

    <footer class="flex-shrink-0 p-12 bg-gray-50"></footer>
    </div>
</x-app-layout>