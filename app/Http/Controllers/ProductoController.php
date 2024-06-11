<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos=request();


        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',

        ],[
            'required'=>'El campo es requerido',
        ]);

        $producto=new Producto;
        $producto->nombre=$datos['nombre'];
        $producto->descripcion=$datos['descripcion'];
        $producto->precio=$datos['precio'];

        $producto->save();


        return redirect()->route('productos.index')->with('success', 'Los datos se han guardado correctamente.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $datos=request();

        $producto = Producto::find($id);
        $producto->nombre=$request->input('nombre');
        $producto->descripcion=$request->input('descripcion');
        $producto->precio=$request->input('precio');

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'El registro ha sido actualizado.');

        return back();
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto Eliminado');
    }
}
