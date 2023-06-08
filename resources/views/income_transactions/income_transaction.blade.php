<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Income Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('income_transactions.create') }}" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 mr-4 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            {{ __("Create New Income") }}
                        </a>
                        @if (Auth::user()->role == 'administrator')
                            <a href="{{ route('worker.index') }}" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                {{ __("Create New Worker") }}
                            </a>    
                        @endif
                        <table class="min-w-full border text-center text-sm dark:border-neutral-500">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Nominal") }}</th>
                                <th>{{ __("Percentage") }}</th>
                                <th>{{ __("Bonus Amount") }}</th>
                                <th>{{ __("Action") }}</th>
                            </thead>
                            <tbody>
                                @forelse ($data as $d)
                                <tr class="border-b dark:border-neutral-500">
                                    <td>{{ $d->name }}</td>
                                    <td>@convertRp($d->nominal)</td>
                                    <td>{{ $d->percentage }}</td>
                                    <td>@convertRp($d->bonus_amount)</td>
                                    <td>
                                        <form action="{{ route('income_transactions.destroy', $d->id) }}" onsubmit="return confirm('Are u sure want to delete this ?')" method="post">
                                            <a href="{{ route('income_transactions.edit', $d->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                {{ __("EDIT") }}
                                            </a>
                                            @if (Auth::user()->role == 'administrator')
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button>
                                                    {{ __("delete") }}
                                                </x-primary-button> 
                                            @endif
                                            <a href="{{ route('income_transactions.show', $d->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                {{ __("SHOW") }}
                                            </a>
                                        </form>
                                    </td>
                                </tr>    
                                @empty
                                    {{ __("No data found here !") }}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>