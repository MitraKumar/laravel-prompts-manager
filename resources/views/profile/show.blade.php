<x-layout>
    <x-navbar></x-navbar>

    @if (Auth::user()->id !== $user->id)
        <div class="max-w-7xl mx-auto pt-16 px-4 md:px-0">
            <form action="/profile/{{ $user->id }}/follow" method="POST">
                @csrf
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Follow</button>
            </form>
        </div>
    @endif

    @if (Auth::user()->id === $user->id)
        <ul>
            <div class="max-w-7xl mx-auto pt-16 px-4 md:px-0">
                <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Your Followers
                </h2>
                <div class="flex flex-col mt-16">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead>
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Name</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200">
                                        @if ($user->followers->isEmpty())
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">You don't
                                                    have any followers...</td>
                                            </tr>
                                        @else
                                            @foreach ($user->followers as $follow)
                                                <tr class="text-neutral-800">
                                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                                        {{ $follow->name }}</td>
                                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $follow->email }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    @endif


    @if (Auth::user()->id === $user->id)
        <ul>
            <div class="max-w-7xl mx-auto pt-16 px-4 md:px-0">
                <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Your Followings
                </h2>
                <div class="flex flex-col mt-16">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead>
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Name</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200">
                                        @if ($user->followings->isEmpty())
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">You don't
                                                    follow anyone...</td>
                                            </tr>
                                        @else
                                            @foreach ($user->followers as $follow)
                                                <tr class="text-neutral-800">
                                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                                        {{ $follow->name }}</td>
                                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $follow->email }}
                                                    </td>
                                                    <td>
                                                        <form action="/profile/{{ $follow->id }}/unfollow"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                                Unfollow</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    @endif

    <div class="max-w-7xl mx-auto pt-16 px-4 md:px-0">
        <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Latest Posts</h2>
        <div class="grid grid-cols-none md:grid-cols-4 gap-2 mt-4">
            @foreach ($user->prompts as $prompt)
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
