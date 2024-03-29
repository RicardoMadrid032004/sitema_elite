<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function dashboard(){
        return Inertia::render('Dashboard');
    }
    public function elite(){
        return Inertia::render('Inicio/Elite');
    }
    public function pre_u(){
        return Inertia::render('Inicio/Pre_u');
    }
    public function pre_e(){
        return Inertia::render('Inicio/Pre_e');
    }

    public function regalos(){
        return Inertia::render('Inicio/Regalo');
    }
    public function eventos(){
        return Inertia::render('Inicio/Evento');
    }
    public function galeria(){
        return Inertia::render('Inicio/Galeria');
    }
}
