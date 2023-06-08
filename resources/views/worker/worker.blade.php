<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Worker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('worker.store')}}" method="post">
                    @csrf
                        <div class="mb-6">
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Name") }}</label>
                            <input type="text" id="small-input" name="name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("NIK") }}</label>
                            <input type="number" id="small-input" name="nik" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('nik')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Place") }}</label>
                            <input type="text" id="small-input" name="place" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('place')
                                {{ $message }}
                            @enderror
                        </div>
                        <x-primary-button>
                            {{ __("Submit") }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>