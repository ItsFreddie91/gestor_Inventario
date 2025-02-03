<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class Getprod extends Component
{
    public $categorias;
    public $productos = [];
    public $categoriaId = null;
    public $productoId = null;
    public $producto = null;

    public function mount(){
        $this->categorias = Categoria::all();
        $this->productos = collect();
    }

    public function render()
    {
        return view('livewire.getprod');
    }

    public function updatedCategoriaId($id): void{
        $this->productos = Producto::where('categoria_id', $id)->get();
        if ($this->producto && $this->producto->first()) {
            $this->producto = $this->producto->first()['id_producto'];
        } else {
            $this->producto = null;
        }
    }
}
