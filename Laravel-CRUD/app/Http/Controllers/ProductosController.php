<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return "Estas en la pagina de inicio";
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // $productos = new Producto;
        // $productos->nombre = $request->nombre;
        return view('productos.insert');
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        return "Hola";
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        return view('productos.update');
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        return view('productos.delete');
        //
    }
    
    public function muestra(){
        return "Respuesta correcta del formulario";
    }
}
