<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Muestra la lista pública de medicamentos
    public function index()
    {
        $medicines = Medicine::latest()->get();
        return view('catalogo', compact('medicines'));
    }

    // Muestra la lista en el panel de administración
    public function adminIndex()
    {
        $medicines = Medicine::latest()->get();
        return view('admin.panel', compact('medicines'));
    }

    // Guardar nuevo medicamento
    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        Medicine::create($request->all());

        return redirect()->back()->with('exito', 'Medicamento registrado correctamente.');
    }

    // Actualizar un medicamento existente
    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $medicine->update($request->all());

        return redirect()->back()->with('exito', 'Medicamento actualizado correctamente.');
    }

    // Eliminar un medicamento
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->back()->with('exito', 'Medicamento eliminado correctamente.');
    }
}