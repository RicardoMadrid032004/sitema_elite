<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\ciclo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AulaController extends Controller
{
    
    public function index(Request $request)
    {
        $ciclos = ciclo::paginate(10);
        $ciclo_id = $request->query('ciclo_id');
        
        $aulasQuery = Aula::query()->with('ciclo');
        
        if ($ciclo_id) {
            $aulasQuery->where('ciclo_id', $ciclo_id);
        }
        
        $aulas = $aulasQuery->paginate(10); // Paginar los resultados
        
        return Inertia::render('Aulas/Index', [
            'aulas' => $aulas, 
            'ciclos' => $ciclos,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'capacidad' => 'required',
            'ciclo_id' => 'required|exists:ciclos,id', 
        ]);

        $aulas = Aula::create($validatedData);

        return redirect()->back();
    }

    public function show(Aula $aula)
    {
        //
    }

 
    public function update(Request $request, Aula $aula)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'capacidad' => 'required',
            'ciclo_id' => 'required|exists:ciclos,id', 
        ]);

        $aula-> update($validatedData);

        return redirect()->back();
    }

    public function destroy(Aula $aula)
    {
        //
    }
}
