<?php

namespace App\Http\Controllers;

use App\Models\Webcategoria;
use App\Models\Webitem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    
   
    public function welcome()
    {
        $webcategorias = Webcategoria::with('webitems')->get();
        return Inertia::render('Welcome', [
            'webcategorias' => $webcategorias,
        ]);
      
    }


    public function elite($slug)
    {

        $categoria = Webitem::where('slug', $slug)->with('productos')->first();

        if ($categoria) {
            $productos = $categoria->productos()->paginate(9);
            // $categorias = Categoria::all();
            // return view('categorias', compact('productos', 'categoria', 'categorias'));
        }else{
            $productos = Webitem::paginate(9);
        }

        $categorias = Webitem::all();

        return view('categorias', compact('categoria', 'categorias', 'productos'));
    }


    public function pre_e(){
        $webitemsCount = Webitem::count();
        $categorias = Webitem::all();
        $proveedores = Webitem::all();
        $productos = Webitem::all();
        $ofertas = Webitem::all();
        return view('welcome',compact('categorias','proveedores','productos','ofertas','ofertasCount'));
    }
    public function show($slug){
        $productos= Webitem::all();

        $producto = Webitem::where('slug', $slug)->first();
        return view('product-details', compact('producto','productos'));


    }


    public function clientes(){

        $clientes = Webitem::all();
        return view('nosotros',compact('clientes'));

    }
}
