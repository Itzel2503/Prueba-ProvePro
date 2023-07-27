@extends('layouts.app')

@section('content')
    <form action="{{ route('proveedores.index') }}" method="GET">
        <div class="form-group">
            <div class="row justify-content-start align-items-center mx-3 ">
                <div class="col-5 align-self-center">
                    <input type="text" name="search" class="form-control" placeholder="Buscar">
                </div>
                <div class="col-5 align-self-center pb-2">
                    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                </div>
                <div class="col-auto align-self-center justify-content-end ">
                    <a href="{{ url()->current() }}" class="btn btn-primary">Mostrar Todos</a>
                </div>
            </div>
        </div>
    </form>
    <div class="container-fluid m-1">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Razón social</th>
                        <th scope="col">Número proveedor</th>
                        <th scope="col">Fecha de registro</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Región</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->nombre }}</a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->razon_social }}</a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->numero_proveedor }}</a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->fecha_registro }}</a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->rfc }}</a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->imagen_random }}</a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('producto.show', $proveedor->id) }}">{{ $proveedor->region->name }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $proveedores->links() }}
        </div>
    </div>
@endsection
