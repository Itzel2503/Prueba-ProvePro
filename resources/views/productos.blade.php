@extends('layouts.app')

@section('content')
    <div class="form-group">
        <div class="row justify-content-start align-items-center mx-3">

            <div class="col">
                <form action="{{ route('producto.show', ['id' => $proveedor->id]) }}" method="GET">
                    <div class="row justify-content-start align-items-center mx-3">
                        <div class="col-5 align-self-center">
                            <input type="text" class="form-control" placeholder="Buscar por nombre" name="search"
                                oninput="validateInput(this)" pattern="^[A-Za-z.\s]+$">
                            <div id="errorMessage" style="display: none; color: #dc3545;">No se permiten números
                            </div>
                        </div>
                        <div class="col-4 align-self-center pb-2">
                            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-auto align-self-center justify-content-end mt-2">
                <a href="{{ url()->current() }}" class="btn btn-primary">Ver todo</a>
            </div>
            <div class="col-auto align-self-center justify-content-end ">
                <a href="{{ route('producto.create', ['id' => $proveedor->id]) }}" class="btn btn-primary">Agregar
                    Producto</a>
            </div>

            <div class="col-auto align-self-center justify-content-end mt-2">
                <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>

    <div class="container-fluid m-1">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Folio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Precio por unidad</th>
                        <th scope="col">Fecha ingreso</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Región</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->folio }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->unidad }}</td>
                            <td>{{ $producto->precio_por_unidad }}</td>
                            <td>{{ $producto->fecha_ingreso }}</td>
                            <td>{{ $producto->proveedor->nombre }}</td>
                            <td>{{ $region }}</td>
                            <td>
                                <a href="{{ route('producto.edit', ['id' => $producto->id]) }}" class="btn">
                                    <i class="bi bi-pencil-fill icon-edit" style="color:blue; cursor:pointer;"></i></a>
                            </td>
                            <td>
                                <button type="button" class=" border-0 bg-transparent" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $producto->id }}"
                                    style="color: #979797; width: 100%; text-align:left">
                                    <i class="bi bi-trash icon-delete" style="color:red; cursor:pointer;"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="delete{{ $producto->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('producto.destroy', ['id' => $producto->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Deseas eliminar este producto?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            {{ $productos->links() }}
        </div>
    </div>
@endsection

<script>
    function validateInput(input) {
        let inputValue = input.value;
        let isValid = /^[A-Za-z.\s]+$/.test(inputValue);

        if (!isValid && inputValue.length > 0) {
            let errorMessage = document.getElementById('errorMessage');
            errorMessage.style.display = 'block';
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 2500);

            // Elimina los caracteres inválidos ingresados por el usuario
            let cleanValue = inputValue.replace(/[^A-Za-z.\s]+/g, '');
            input.value = cleanValue;
        }
    }
</script>
