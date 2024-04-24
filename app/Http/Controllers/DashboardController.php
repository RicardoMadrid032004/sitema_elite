<?php

namespace App\Http\Controllers;

use App\Models\Webcategoria;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){

        $webcategorias = Webcategoria::with('webitems')->get();

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'webcategorias' => $webcategorias,
        ]);
    }

    public function dashboard(){
        return Inertia::render('Dashboard');
    }
    public function elite(){
        $webcategorias = Webcategoria::with('webitems')->get();

        return Inertia::render('Inicio/Elite',
        [
            'webcategorias' => $webcategorias,
        ]);
    }
    public function pre_u(){
        return Inertia::render('Inicio/Pre_u');
    }
    public function pre_e(){
        return Inertia::render('Inicio/Pre_e');
    }

    public function regalos(){
        $webcategorias = Webcategoria::with('webitems')->get();
        return Inertia::render('Inicio/Regalo',
        [
            'webcategorias' => $webcategorias,
        ]
       );
    }
    public function eventos(){
        $webcategorias = Webcategoria::with('webitems')->get();
        return Inertia::render('Inicio/Evento',
        [
            'webcategorias' => $webcategorias,
        ]
       );
    }
    public function galeria(){
        $webcategorias = Webcategoria::with('webitems')->get();
        return Inertia::render('Inicio/Galeria',
        [
            'webcategorias' => $webcategorias,
        ]
       );
    }
}
