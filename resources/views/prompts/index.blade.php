<x-layout>


    <x-navbar></x-navbar>

    
    <div class="w-full l:w-1/2 m-auto p-16">
        <div class="grid grid-cols-none md:grid-cols-4 gap-2">
            @foreach ($prompts as $prompt)
                <a href="/prompts/{{ $prompt->id }}"
                    class="block max-w-sm p-6 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-300">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $prompt->name }}</h5>
                    <p class="font-normal text-gray-700">{{ $prompt->description }}</p>
                    <p class="font-normal text-gray-700 mt-4">- {{ $prompt->user->name }}</p>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
