<div>
    <div class="col-12 mb-3">
        <label class="form-label">Categoría</label>
        <select class="form-select" name="Categoria" wire:model.live="categoriaId" required>
            <option value="">Seleccionar Categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Producto</label>
        <select class="form-select" name="Prod_Id" wire:model="productoId" required>
            <option value="">Seleccionar Producto</option>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
            @endforeach
        </select>
    </div>
</div>
