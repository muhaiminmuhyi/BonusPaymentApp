<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6 text-gray-900">
                        <div class="p-6 text-gray-900">
                            <p>Berikut data detail yang dapat anda lihat dan jika merasa ada yang salah bisa di edit pada halaman depan, Terima Kasih</p>
                            <table class="min-w-full border text-center text-sm dark:border-neutral-500">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <th>{{ __("Name") }}</th>
                                    <th>{{ __("Nominal") }}</th>
                                    <th>{{ __("Percentage") }}</th>
                                    <th>{{ __("Bonus Amount") }}</th>
                                </thead>
                                <tbody>
                                    @forelse ($data as $d)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td>{{ $d->name }}</td>
                                        <td>@convertRp($d->nominal)</td>
                                        <td>{{ $d->percentage }}%</td>
                                        <td>@convertRp($d->bonus_amount)</td>
                                    </tr>    
                                    @empty
                                        {{ __("No data found here !") }}
                                    @endforelse
                                </tbody>
                            </table>
                            <a type="button" href="{{route('income_transactions.index')}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 mt-4 py-2 mr-2 mb-2">
                                {{__("BACK")}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
