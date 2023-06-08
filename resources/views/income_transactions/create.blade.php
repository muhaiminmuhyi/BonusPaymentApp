<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Income') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('income_transactions.store') }}" method="post">
                    @csrf
                        <div class="mb-6">
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Payment") }}</label>
                            <input type="number" id="small-input" name="nominal" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('nominal')
                                {{ $message }}
                            @enderror
                        </div>
                        @forelse ($data as $d)
                            <div class="mb-6">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ $d->name }}</label>
                                <input type="hidden" id="small-input" name="id[]" value="{{ $d->id }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <input type="number" id="small-input" name="percentage[]" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('percentage')
                                    {{ $message }}
                                @enderror
                            </div>
                        @empty
                            <a href="{{ route('worker.index') }}" class="text-sm text-red-600"><b>worker</b> not found, click here for create!</a><br>
                        @endforelse
                        <x-primary-button>
                            {{ __("Submit") }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
