<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proveedor = Proveedores::find($id);

        return view('actionproductos.create', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $producto = new Productos;
        $producto->nombre = $request->nombre;
        $producto->folio = $request->folio;
        $producto->cantidad = $request->cantidad;
        $producto->unidad = $request->unidad;
        $producto->precio_por_unidad = $request->precio_por_unidad;
        $producto->fecha_ingreso = $request->fecha_ingreso;
        $producto->id_proveedor = $id;
        $producto->save();

        return redirect()->route('producto.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $proveedor = Proveedores::find($id);
        $region =$proveedor->region->name;

        $search = $request->input('search');

        $productos = $proveedor->productos()
            ->when($search, function ($query) use ($search) {
                return $query->where('nombre', 'like', '%' . $search . '%');
            })
            ->paginate(20);

        return view('productos', compact('productos', 'proveedor', 'region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Productos::find($id);
        $proveedor = $producto->proveedor;
        
        return view('actionproductos.edit', compact('producto', 'proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
        $proveedor = $producto->proveedor->id;

        $producto->nombre = $request->nombre;
        $producto->folio = $request->folio;
        $producto->cantidad = $request->cantidad;
        $producto->unidad = $request->unidad;
        $producto->precio_por_unidad = $request->precio_por_unidad;
        $producto->fecha_ingreso = $request->fecha_ingreso;
        $producto->id_proveedor = $proveedor;
        $producto->save();

        return redirect()->route('producto.show', $proveedor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();
        $proveedor = $producto->proveedor->id;

        return redirect()->route('producto.show', $proveedor);
    }
}
