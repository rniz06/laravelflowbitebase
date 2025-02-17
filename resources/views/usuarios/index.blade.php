@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('page_nav_title', 'Usuarios')
@section('page_nav_detail', 'Listar')

@section('contenido')

    {{-- Mostrar un alert en caso de haber algun mensaje --}}
    @if ($message = Session::get('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <i class="fa-solid fa-circle-info shrink-0 inline w-4 h-4 me-3"></i>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ $message }}</span>
            </div>
        </div>
    @endif

    @livewire('usuarios.tabla')
@endsection

@section('css')
    {{-- Aqui archivo o enlaces css personalizados --}}
@endsection

@section('js')
    {{-- Aqui archivo o enlaces Js personalizados --}}
@endsection