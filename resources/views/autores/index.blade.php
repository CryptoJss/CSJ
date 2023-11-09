<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __($title) }}
                </h2>
            </div>
            <div class="flex items-center">
                <a href="{{ route($table.'.create') }}" class="flex items-center" data-toggle="togle" data-placement="right" title="Agregar Agregar registro">
                    <svg class="w-6 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6v12m6-6H6" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span class="ml-2">Agregar Autores</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg ">
                <table class="w-full text-sm text-center table-auto text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Nombre</th>
                        <th>Apellido</th>
                        <th>Contacto</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $e)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $e->Nombre }}
                                </td>
                                <td>{{ $e->Apellido }}</td>
                                <td>{{ $e->Contacto }}</td>
                                <td>{{ \Carbon\Carbon::parse($e->Fecha)->format('j M Y, g:i: a') }}</td>
                                <td class="text-center">
                                    <a href="{{ route($table.'.edit', ['autore' => $e->id ]) }}" class="inline-block">
                                        <svg class="w-6 h-6 text-gray-500 dark:border-gray-300" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </td>
                                <th>
                                    <form action="{{ route($table.'.destroy', ['autore' => $e->id ]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            tag="{{ $e->id }}">
                                                <svg class="w-5 h-5 text-gray-500 dark:border-gray-300" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>