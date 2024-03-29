<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveWebcategoriRequest;
use App\Models\Webcategoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebcategoriaController extends Controller
{

    public function index()
    {
        return Inertia::render('Web/Index', [
            'webcategorias' => Webcategoria::paginate(10)
        ]);
    }

    public function store(SaveWebcategoriRequest $request)
    {
        Webcategoria::create($request->validated());

        return redirect()->back();
    }

  

    public function update(SaveWebcategoriRequest $request, Webcategoria $webcategoria)
    {
        $webcategoria->update($request->validated());

        return redirect()->back();
    }

    public function destroy(Webcategoria $webcategoria)
    {
        $webcategoria->delete();

        return redirect()->back();
    }
}
