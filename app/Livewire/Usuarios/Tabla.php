<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $paginado = 5;              // Define la cantidad de registros a mostrar por página
    public $buscador = "";             // Buscador general por todos los campos

    /**
     * Método que se ejecuta al actualizar una de las propiedades de búsqueda o paginación.
     * Si se detecta un cambio en alguna de estas propiedades, se resetea la paginación
     * para evitar inconsistencias en los resultados mostrados.
     */
    public function updating($key): void
    {
        if ($key === 'paginado' || $key === 'buscador') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $usuarios = User::select('id', 'name', 'email', 'nickname', 'created_at')->buscador($this->buscador)->paginate($this->paginado);
        return view('livewire.usuarios.tabla', compact('usuarios'));
    }
}
