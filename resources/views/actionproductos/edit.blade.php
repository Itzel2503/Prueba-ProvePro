@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('producto.update', $producto->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Nombre</label>
                    <input required type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Folio</label>
                    <input required type="text" class="form-control" name="folio" maxlength="10"
                        value="{{ $producto->folio }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Cantidad</label>
                    <input required type="text" class="form-control" name="cantidad" placeholder="Solo números"
                        oninput="validateCantidad(this)" value="{{ $producto->cantidad }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCity">Unidad</label>
                    <input required type="text" class="form-control" name="unidad" maxlength="5"
                        value="{{ $producto->unidad }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Precio por unidad</label>
                    <input required type="text" class="form-control" name="precio_por_unidad" placeholder="Solo números"
                        oninput="validatePrecio(this)" value="{{ $producto->precio_por_unidad }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Fecha de ingreso</label>
                    <input required type="date" class="form-control" name="fecha_ingreso" min="2023-01-01"
                        max="2023-12-31" value="{{ $producto->fecha_ingreso }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Proveedor</label>
                    <input readonly type="text" class="form-control" value="{{ $proveedor->nombre }}">
                </div>
            </div>

            <div class="row mt-4 justify-content-between align-items-center">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <div class="col-1">
                    <a href="{{ route('producto.show', ['id' => $proveedor->id]) }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </form>
    </div>
@endsection
<script>
    function validateCantidad(input) {
        let inputValue = input.value;
        let isValid = /^[0-9]+$/.test(inputValue);

        if (!isValid && inputValue.length > 0) {
            // Elimina los caracteres inválidos ingresados por el usuario
            let cleanValue = inputValue.replace(/[^0-9]+/g, '');
            input.value = cleanValue;
        }
    }

    function validatePrecio(input) {
        let inputValue = input.value;
        let isValid = /^[0-9.]+$/.test(inputValue);

        if (!isValid && inputValue.length > 0) {
            let cleanValue = inputValue.replace(/[^0-9.]+/g, '');
            input.value = cleanValue;
        }
    }
</script>
