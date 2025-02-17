@extends('layouts.plantilla')

@section('title', 'Usuarios Editar')
@section('page_nav_title', 'Usuarios')
@section('page_nav_detail', 'Editar')

@section('contenido')
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                    Completo:</label>
                <input type="text" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre completo..." maxlength="50" required value="{{ old('name', $user->name) }}" />
                @error('name')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                <input type="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Email..." maxlength="40" required value="{{ old('email', $user->email) }}" />
                @error('email')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nickname:</label>
                <input type="text" name="nickname"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nickname..." maxlength="20" required value="{{ old('nickname', $user->nickname) }}" />
                @error('nickname')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="phone"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña:</label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Contraseña..." minlength="8" maxlength="20" />
                @error('password')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles:</label>
                <select id="countries" name="roles[]" required multiple="multiple"
                    class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}" {{ in_array($value, $userRole ?? []) ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <a href="{{ route('usuarios.index') }}"
            class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            <i class="fa-solid fa-arrow-left"></i> Volver
        </a>
        <button type="submit"
            class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <i class="fa-regular fa-floppy-disk w-3 h-3 text-white me-2"></i> Actualizar
        </button>
    </form>


@endsection

@section('css')
    {{-- Aqui archivo o enlaces css personalizados --}}
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
    <style>
        /* Corrige estilos del select2 */
        .selection span {
            height: 38px !important;
        }
    </style>

@endsection

@section('js')
    {{-- Archivo jquery, select2 y script de inicialización de select2 --}}
    <script src="{{ asset('js/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/select2_4.1.0-rc.0/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Selecciona una opción',
                allowClear: true,
            });
        });
    </script>
@endsection
