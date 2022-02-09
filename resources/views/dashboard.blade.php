<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feladatnyilvántartás') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="add-button-container">
                        <button id="add-new-button" class="rounded-lg px-4 py-2 my-2 bg-green-400 text-white"
                        type="button">Új hozzáadása</button>
                    </div>
                    <div class="modal-wrapper">
                        <div id="add-new-modal" class="hidden bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
                            <div class="bg-white px-16 py-14 rounded-md text-center">
                              <h1 class="text-xl mb-4 font-bold text-slate-500">Új hozzáadása</h1>
                              <form action="" method="post" id="new-task-form">
                                <input name="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="date" type="text" placeholder="Dátum">
                                <input name="hours" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="hours" type="number" min="1" max="12" placeholder="Szükséges idő (óra)">
                                <textarea
                                    class="
                                        form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        mb-3
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                    "
                                    id="description"
                                    rows="3"
                                    placeholder="Leírás"
                                ></textarea>
                              </form>
                              <div>
                                  <ul id="error-messages" class="mb-2">
                                    {{-- Error messages go here via jquery --}}
                                  </ul>
                              </div>
                              <button id="cancel-button" class="bg-blue-400 px-4 py-2 rounded-md text-md text-white">Mégsem</button>
                              <button id="save-button" class="bg-green-400 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Mentés</button>
                            </div>
                          </div>
                    </div>

                    <table class="table-fill">
                        <thead>
                            <tr>
                                <th class="text-left">Hétfő</th>
                                <th class="text-left">Kedd</th>
                                <th class="text-left">Szerda</th>
                                <th class="text-left">Csütörtök</th>
                                <th class="text-left">Péntek</th>
                                <th class="text-left">Összeg</th>
                                <th class="text-left">Hét</th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
