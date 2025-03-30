@props([
    'action',
    'method',
    'prompt' => NULL,
    'title' => "Add Prompts",
    'description' => "This information will be displayed publicly so be careful what you share.",
    'submit_button_text' => "Add Prompt",
])

<form action="{{ $action }}" method="{{ $method }}">
    @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">{{ $title }}</h2>
            <p class="mt-1 text-sm/6 text-gray-600">{{ $description }}</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Prompt Title" value="{{ $prompt ? $prompt->name : "" }}">
                    </div>
                </div>
            </div>

            <div class="col-span-full">
                <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3" 
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    >{{ $prompt ? $prompt->description : "" }}</textarea>
                </div>
                <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the prompt.</p>
            </div>

            <div class="col-span-full">
                <label for="question" class="block text-sm/6 font-medium text-gray-900">Question</label>
                <div class="mt-2">
                    <textarea
                        name="question" 
                        id="question" rows="3"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    >{{ $prompt ? $prompt->question : "" }}</textarea>
                </div>
                <p class="mt-3 text-sm/6 text-gray-600">Add the question for the prompt here.</p>
            </div>

            <div class="col-span-full">
                <label for="result" class="block text-sm/6 font-medium text-gray-900">Result</label>
                <div class="mt-2">
                    <textarea 
                    name="result" 
                    id="result" 
                    rows="3"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    >{{ $prompt ? $prompt->result : "" }}</textarea>
                </div>
                <p class="mt-3 text-sm/6 text-gray-600">Add the result from the prompt here.</p>
            </div>

        </div>
    </div>


    <div class="mt-6 flex items-center justify-end gap-x-6">
        {{-- <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button> --}}
        <button
            type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >{{ $submit_button_text }}</button>
    </div>
</form>
