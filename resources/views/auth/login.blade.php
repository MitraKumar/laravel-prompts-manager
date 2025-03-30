<x-layout>

    <x-navbar></x-navbar>

    <div class="max-w-md mx-auto pt-16 px-4 md:px-0">
        <form action="/login" method="POST">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Login</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email"
                                    class="block w-full grow py-1.5 pr-3 pl-1 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="name@email.com">
                            </div>
                            @if ($errors->has('email'))
                                <span class="sm:col-span-6 text-sm text-red-500">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="password" id="password"
                                    class="block w-full grow py-1.5 pr-3 pl-1 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="******">
                            </div>
                            @if ($errors->has('password'))
                                <span class="sm:col-span-6 text-sm text-red-500">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>


                </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                {{-- <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button> --}}
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </div>
        </form>
    </div>




</x-layout>
