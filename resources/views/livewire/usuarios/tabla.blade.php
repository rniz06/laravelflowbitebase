<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between">
        <label for="table-search" class="sr-only">Buscar</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass w-4 h-4 text-gray-500 dark:text-gray-400"></i>
            </div>
            <input type="text" id="table-search" wire:model.live="buscador"
                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar...">
        </div>
        <div class="p-2">
            @can('Usuarios Crear')
                <a href="{{ route('usuarios.create') }}"
                    class="px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                        class="fa-solid fa-plus"></i> Añadir</a>
            @endcan
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre Completo:
                </th>
                <th scope="col" class="px-6 py-3">
                    Email:
                </th>
                <th scope="col" class="px-6 py-3">
                    Nickname:
                </th>
                <th scope="col" class="px-6 py-3">
                    Creado el:
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones:
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" value="{{ $usuario->id }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $usuario->name ?? 'N/A' }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $usuario->email ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $usuario->nickname ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y h:m', strtotime($usuario->created_at)) }} Hs
                    </td>
                    <td class="flex items-center px-6 py-4">
                        @can('Usuarios Editar')
                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        @endcan
                        @can('Usuarios Eliminar')
                            <form action="{{route('usuarios.destroy', $usuario->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</button>
                            </form>
                        @endcan
                        {{-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</button> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center italic px-6 py-4">Sin Registros coincidentes...</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">
        <div class="flex justify-center items-center mb-2">
            <select id="countries" wire:model.live="paginado"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="5" selected>5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </div>
        {{ $usuarios->links() }}
    </div>
</div>
