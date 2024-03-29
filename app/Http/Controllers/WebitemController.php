<?php

namespace App\Http\Controllers;

use App\Models\Webcategoria;
use App\Models\Webitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class WebitemController extends Controller
{
    public function index(Request $request)
    {
        $webcategorias = Webcategoria::paginate(10);
        $webcategoria_id = $request->query('webcategoria_id');
        
        $webitemsQuery = Webitem::query()->with('webcategoria');
        
        if ($webcategoria_id) {
            $webitemsQuery->where('webcategoria_id', $webcategoria_id);
        }
        
        $webitems = $webitemsQuery->paginate(10); // Paginar los resultados
        
        return Inertia::render('Wimg/Index', [
            'webitems' => $webitems, 
            'webcategorias' => $webcategorias,
        ]);
    }

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'text' => 'required|string',
            'image' => 'required|image', 
            'eslider' => 'required|image', 
            'webcategoria_id' => 'required|exists:webcategorias,id', 
        ]);

        $webitem = Webitem::create($validatedData);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/productos'), $fileName);
            $webitem->image = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('eslider')) {
            $file = $request->file('eslider');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/carrusel'), $fileName);
            $webitem->eslider = $fileName;
            $webitem->save();
        }

        return redirect()->back();
    
    }

    // public function update(Request $request, Webitem $webitem)
    // {
    //     $validatedData = $request->validate([
    //         'text' => 'required|string',
    //         'image' => 'nullable|image',
    //         'eslider' => 'nullable|image', 
    //         'webcategoria_id' => 'required|exists:webcategorias,id',
    //     ]);
    //      $webitem->update($validatedData);

    //         if($request->hasFile('image')){
    //             $file = $request->image;
    //             $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
    //             $webitem->image = $file->getClientOriginalName();
    //         }
    //         if($request->hasFile('eslider')){
    //             $file = $request->eslider;
    //             $file->move(public_path(). '/img/carrusel', $file->getClientOriginalName());
    //             $webitem->eslider = $file->getClientOriginalName();
    //         }
           
    //     return redirect()->back();
    // }

    public function update(Request $request,$id)
    {
        $webitem = Webitem::findOrFail($id);

        // $producto->categoria_id  = $request->get('categoria_id');
        $webitem->webcategoria_id  = auth()->id();
        $webitem->text          = $request->get('text');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
                $webitem->image = $file->getClientOriginalName();
            }
            if($request->hasFile('eslider')){
                $file = $request->eslider;
                $file->move(public_path(). '/img/carrusel', $file->getClientOriginalName());
                $webitem->eslider = $file->getClientOriginalName();
            }
           
        $webitem->update();
        return redirect()->back();
        //
    }
  
    // public function destroy(Webitem $webitem)
    // {
    //     $webitem->delete();
    //     return redirect()->back();
    // }
    public function destroy($id)
    {
        $webitem = Webitem::find($id);
        unlink(public_path('img/productos/'.$webitem->image));
        unlink(public_path('img/carrusel/'.$webitem->eslider));
        $webitem->delete();
        return redirect()->back();
        //
    }
}
