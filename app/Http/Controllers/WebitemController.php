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
            'text1' => '',
            'text2' => '',
            'text3' => '',
            'text4' => '',
            'image1' => '', 
            'image2' => '', 
            'image3' => '', 
            'image4' => '', 
            'eslider1' => '', 
            'eslider2' => '', 
            'eslider3' => '', 
            'eslider4' => '', 
            'webcategoria_id' => 'required|exists:webcategorias,id', 
        ]);

        $webitem = Webitem::create($validatedData);
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/productos'), $fileName);
            $webitem->image1 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/productos'), $fileName);
            $webitem->image2 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/productos'), $fileName);
            $webitem->image3 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('image4')) {
            $file = $request->file('image4');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/productos'), $fileName);
            $webitem->image4 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('eslider1')) {
            $file = $request->file('eslider1');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/carrusel'), $fileName);
            $webitem->eslider1 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('eslider2')) {
            $file = $request->file('eslider2');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/carrusel'), $fileName);
            $webitem->eslider2 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('eslider3')) {
            $file = $request->file('eslider3');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/carrusel'), $fileName);
            $webitem->eslider3 = $fileName;
            $webitem->save();
        }
        if ($request->hasFile('eslider4')) {
            $file = $request->file('eslider4');
            $fileName = uniqid('product_') . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('img/carrusel'), $fileName);
            $webitem->eslider4 = $fileName;
            $webitem->save();
        }

        return redirect()->back();
    
    }

    // public function update(Request $request,$id)
    // {
    //     $webitem = Webitem::findOrFail($id);

    //     // $producto->categoria_id  = $request->get('categoria_id');
    //     $webitem->webcategoria_id  = auth()->id();
    //     $webitem->text1          = $request->get('text1');
    //     $webitem->text2          = $request->get('text2');
    //     $webitem->text3          = $request->get('text3');
    //     $webitem->text4          = $request->get('text4');
    //         if($request->hasFile('image1')){
    //             $file = $request->image1;
    //             $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
    //             $webitem->image1 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('image2')){
    //             $file = $request->image2;
    //             $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
    //             $webitem->image2 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('image3')){
    //             $file = $request->image3;
    //             $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
    //             $webitem->image3 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('image4')){
    //             $file = $request->image4;
    //             $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
    //             $webitem->image4 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('eslider1')){
    //             $file = $request->eslider1;
    //             $file->move(public_path(). '/img/carrusel', $file->getClientOriginalName());
    //             $webitem->eslider1 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('eslider2')){
    //             $file = $request->eslider2;
    //             $file->move(public_path(). '/img/carrusel', $file->getClientOriginalName());
    //             $webitem->eslider2 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('eslider3')){
    //             $file = $request->eslider3;
    //             $file->move(public_path(). '/img/carrusel', $file->getClientOriginalName());
    //             $webitem->eslider3 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
    //         if($request->hasFile('eslider4')){
    //             $file = $request->eslider4;
    //             $file->move(public_path(). '/img/carrusel', $file->getClientOriginalName());
    //             $webitem->eslider4 = $file->getClientOriginalName();
    //             $webitem->update();
    //         }
           
    //     return redirect()->back();
    //     //
    // }
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'text1' => 'nullable',
            'text2' => 'nullable',
            'text3' => 'nullable',
            'text4' => 'nullable',
            'image1' => 'image', // Ajusta las reglas según tus necesidades
            'image2' => 'image',
            'image3' => 'image',
            'image4' => 'image',
            'eslider1' => 'image',
            'eslider2' => 'image',
            'eslider3' => 'image',
            'eslider4' => 'image',
        ]);

        try {
            // Encontrar el Webitem
            $webitem = Webitem::findOrFail($id);

            // Actualizar los campos de texto
            $webitem->update([
                'text1' => $request->text1,
                'text2' => $request->text2,
                'text3' => $request->text3,
                'text4' => $request->text4,
            ]);

            // Manejar las imágenes
            for ($i = 1; $i <= 4; $i++) {
                $fieldName = "image$i";
                if ($request->hasFile($fieldName)) {
                    $file = $request->file($fieldName);
                    $fileName = $file->getClientOriginalName();
                    $file->move(public_path() . '/img/productos', $fileName);
                    $webitem->$fieldName = $fileName;
                }
            }

            // Manejar los eslider
            for ($i = 1; $i <= 4; $i++) {
                $fieldName = "eslider$i";
                if ($request->hasFile($fieldName)) {
                    $file = $request->file($fieldName);
                    $fileName = $file->getClientOriginalName();
                    $file->move(public_path() . '/img/carrusel', $fileName);
                    $webitem->$fieldName = $fileName;
                }
            }

            // Guardar los cambios
            $webitem->save();

            return redirect()->back()->with('success', 'Webitem actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el Webitem: ' . $e->getMessage());
        }
    }

  
    // public function destroy(Webitem $webitem)
    // {
    //     $webitem->delete();
    //     return redirect()->back();
    // }
    // public function destroy($id)
    // {
    //     $webitem = Webitem::find($id);
    //     unlink(public_path('img/productos/'.$webitem->image1));
    //     unlink(public_path('img/productos/'.$webitem->image2));
    //     unlink(public_path('img/productos/'.$webitem->image3));
    //     unlink(public_path('img/productos/'.$webitem->image4));
    //     unlink(public_path('img/carrusel/'.$webitem->eslider1));
    //     unlink(public_path('img/carrusel/'.$webitem->eslider2));
    //     unlink(public_path('img/carrusel/'.$webitem->eslider3));
    //     unlink(public_path('img/carrusel/'.$webitem->eslider4));
    //     $webitem->delete();
    //     return redirect()->back();
    //     //
    // }
    public function destroy($id)
    {
        $webitem = Webitem::find($id);

        // Verificar y eliminar las imágenes solo si tienen un valor
        if ($webitem->image1) {
            unlink(public_path('img/productos/'.$webitem->image1));
        }
        if ($webitem->image2) {
            unlink(public_path('img/productos/'.$webitem->image2));
        }
        if ($webitem->image3) {
            unlink(public_path('img/productos/'.$webitem->image3));
        }
        if ($webitem->image4) {
            unlink(public_path('img/productos/'.$webitem->image4));
        }
        if ($webitem->eslider1) {
            unlink(public_path('img/carrusel/'.$webitem->eslider1));
        }
        if ($webitem->eslider2) {
            unlink(public_path('img/carrusel/'.$webitem->eslider2));
        }
        if ($webitem->eslider3) {
            unlink(public_path('img/carrusel/'.$webitem->eslider3));
        }
        if ($webitem->eslider4) {
            unlink(public_path('img/carrusel/'.$webitem->eslider4));
        }

        // Eliminar el registro de la base de datos
        $webitem->delete();

        return redirect()->back();
    }

}
