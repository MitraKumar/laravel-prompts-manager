<x-layout>

    <x-navbar></x-navbar>

    <div class="max-w-7xl mx-auto pt-16 px-4 md:px-0">
        <div class="border-b border-gray-900/10 pb-4">
            <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $prompt->name }}
            </h2>

            <p class="mt-4">{{ $prompt->description }} </p>
            <p class="mt-4">Written By - <a class="text-blue-600" href="/profile/{{ $prompt->user->id }}">{{ $prompt->user->name }}</a></p>
            @can('edit-own-prompt', $prompt)   
                <a href="/prompts/{{ $prompt->id }}/edit" class="inline-block mt-8 py-4 px-2 bg-blue-500 hover:bg-blue-700 hover:text-white">Update Prompt</a>
            @endcan
        </div>

        <div class="mt-8 space-y-4 max-w-xl mx-auto bg-blue-300 p-8">
            <div class="flex flex-col items-end gap-1">
                <span>You</span>
                <div
                    class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-300 rounded-e-xl rounded-es-xl">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900">{{ $prompt->question }}</span>
                    </div>
                </div>
            </div>
    
            <div class="flex flex-col items-start gap-1">
                <span>AI Response</span>
                <div
                    class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-300 rounded-e-xl rounded-es-xl">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900">{{ $prompt->result }}</span>
                    </div>
                </div>
            </div>
        </div>




        
    </div>

</x-layout>
