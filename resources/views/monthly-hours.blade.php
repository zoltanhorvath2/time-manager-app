<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feladatnyilvántartás') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="overflowing">

                    {{-- Monthly Hours Table --}}
                    <h3>Összes óraszám havi lebontásban</h3>
                    <table class="table-fill" id='months-table'>
                        <thead>
                            <tr>
                                @foreach ($data as $perMonth)
                                    <th class="text-left">2022.{{$perMonth->month}}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                @foreach ($data as $perMonth)
                                    <td class="text-left">{{$perMonth->total_hours}} óra</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                    {{-- Monthly Hours Table ends --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
