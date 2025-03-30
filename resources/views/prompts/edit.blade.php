<x-layout>

    <x-navbar />


    <div class="max-w-md mx-auto pt-16 px-4 md:px-0">
        <x-prompt-form 
            action="/prompts/{{ $prompt->id }}" 
            method="POST" 
            :prompt="$prompt" 
            title="Update Prompt - {{ $prompt->name }}"
            submit_button_text="Update Prompt"
        />
    </div>



</x-layout>
