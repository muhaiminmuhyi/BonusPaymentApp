<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Income') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($data as $d)
                    <form action="{{ route('income_transactions.update', $d->id) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="mb-6">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Name") }}</label>
                                <input type="text" id="small-input" value="{{ old('name', $d->name) }}" name="name" class="@error('name') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                                <a onclick="fail()" href="#" class="text-sm text-blue-500">want to change about <b>worker</b> ? click here!</a>
                                @error('name')
                                    {{ $message }}
                                @enderror                            
                            </div>
                            <div class="mb-6">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Nominal") }}</label>
                                <input type="text" id="nominal" value="{{ old('nominal', $d->nominal) }}" name="nominal" class="@error('nominal') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                                <a onclick="fail()" href="#" class="text-sm text-blue-500">want to change <b>nominal</b> ? click here!</a>
                                @error('nominal')
                                    {{ $message }}
                                @enderror                            
                            </div>
                            <div class="mb-6">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Percentage") }}</label>
                                <input type="text" id="percentage" value="{{ old('percentage', $d->percentage) }}" name="percentage" class="@error('percentage') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('percentage')
                                    {{ $message }}
                                @enderror                            
                            </div>
                            <div class="mb-6">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Bonus Amount") }}</label>
                                <input type="text" id="bonus_payment" value="{{ old('bonus_amount', $d->bonus_amount) }}" name="bonus_amount" class="@error('bonus_amount') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                                @error('bonus_payment')
                                    {{ $message }}
                                @enderror                            
                            </div>
                            <x-primary-button>
                                {{ __("Submit") }}
                            </x-primary-button>
                        </form>
                    @empty
                        {{ __("No data found") }}
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('#nominal, #percentage').keyup(function(){
               var value1 = parseFloat($('#nominal').val()) || 0;
               var value2 = parseFloat($('#percentage').val()) || 0;
               $('#bonus_payment').val(value1*value2/100);
            });
        });
        function fail () {
            toastr.error('Sorry feature under maintenance :(', 'Error!');
        }
    </script>
</x-app-layout>