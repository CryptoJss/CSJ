<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg ">
                <form action="{{ route($table.'.update', ['autore' => $data->id]) }}" method="POST" accept-charset="UTF-8">
                    @csrf
                    @method('PUT')
                    <!-- Cambiar el formulario segun los campos necesarios desde aqui -->
                    <div class="grid gap-6 mb-12 md:grid-cols-2">
                        <div>
                            <label for="Nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nombre de autor
                            </label>
                            <input
                                type="text"
                                name="Nombre"
                                id="Nombre"
                                value="{{ $data->Nombre }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre" required>
                        </div>
                        <div>
                            <label for="Apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Apellido de autor
                            </label>
                            <input
                                type="text"
                                name="Apellido"
                                id="Apellido"
                                value="{{ $data->Apellido }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido" required>
                        </div>
                        <div>
                            <label for="Contacto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Contacto de autor
                            </label>
                            <input
                                type="text"
                                name="Contacto"
                                id="Contacto"
                                value="{{ $data->Contacto }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contacto" required>
                        </div>
                        <div>
                            <label for="Fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Fecha
                            </label>
                            <input
                                type="date"
                                id="Fecha"
                                name="Fecha"
                                value="{{ \Carbon\Carbon::parse($data->Fecha)->format('Y-m-d')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha" required>
                        </div>
                        <div>
                            <label for="Direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Contacto de autor
                            </label>
                            <input
                                type="text"
                                name="Direccion"
                                id="Direccion"
                                value="{{ $data->Direccion }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Direccion" required>
                        </div>
                    </div>
                    <!-- Cambiar hasta aqui lo demas es igual -->
                    <div class="grid gap-6 mb-12 md:grid-cols-2 mt-3">
                        <a href="{{ URL::previous() }}"
                            class="text-gray-500 dark:border-gray-300 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Volver
                        </a>
                        <button
                            type="submit"
                            class="text-gray-500 dark:border-gray-300 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Guardar
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
