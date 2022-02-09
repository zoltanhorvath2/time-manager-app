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
                                <th class="text-left">Jan</th>
                                <th class="text-left">Feb</th>
                                <th class="text-left">Már</th>
                                <th class="text-left">Ápr</th>
                                <th class="text-left">Máj</th>
                                <th class="text-left">Jún</th>
                                <th class="text-left">Júl</th>
                                <th class="text-left">Aug</th>
                                <th class="text-left">Szep</th>
                                <th class="text-left">Okt</th>
                                <th class="text-left">Nov</th>
                                <th class="text-left">Dec</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Monthly Hours Table ends --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
