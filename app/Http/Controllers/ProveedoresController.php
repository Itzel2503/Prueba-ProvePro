<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $proveedores = Proveedores::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%')
                ->orWhere('numero_proveedor', 'like', '%' . $search . '%')
                ->orWhere('fecha_registro', 'like', '%' . $search . '%')
                
                ->whereHas('region', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        })->paginate(20);

        return view('proveedores', compact('proveedores'));
    }
}
