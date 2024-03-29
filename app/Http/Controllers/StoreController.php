<?php

namespace App\Http\Controllers;

use App\Models\Webitem;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    
    public function welcome()
    {
        
         // Obtener el registro con ID 1
        $registro = Webitem::find(1);

        // Verificar si se encontró el registro
        if ($registro) {
            // Pasar el texto del registro a la vista
            return view('Welcome', ['textoDesdeBD' => $registro->text]);
        } else {
            // En caso de que no se encuentre el registro, pasa un valor predeterminado o maneja el caso según tus necesidades
            return view('Welcome', ['textoDesdeBD' => 'Texto no encontrado']);
        }
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
