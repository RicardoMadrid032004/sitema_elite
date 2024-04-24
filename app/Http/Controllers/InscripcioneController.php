<?php

namespace App\Http\Controllers;

use App\Models\ciclo;
use App\Models\Inscripcione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class InscripcioneController extends Controller
{
    public function index()
    {
        $ciclos=ciclo::all();
        return Inertia::render('Inscripcion/Index', [
            'ciclos'=>$ciclos,
            'inscripciones' => Inscripcione::paginate(10)
        ]);
    }

    public function create()
    {
        $ciclos = Ciclo::all();
        
        return Inertia::render('Inscripcion/Create', [
            'ciclos' => $ciclos,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'numeroDocumento' => 'required|string',
            'nombres' => 'required|string',
            'apellidoPaterno' => 'required|string',
            'apellidoMaterno' => 'required|string',
            'nombre_apoderado' => 'required|string',
            'apellido_apoderado' => 'required|string',
            'ciclo_id' => 'required',
            'monto_a_pagar' => 'required|numeric',
            'modalidad_pago' => 'required|string',
            'fecha_inscripcion' => 'required|date',
        ]);
    
        $token = 'apis-token-7959.7xDiEGHKmeFqMwnoMNDVkktXZLJmY6Z2'; // Reemplaza con tu token
        $dni = $request->input('numeroDocumento');
    
        // Iniciar llamada a API con cURL
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/consulta-dni-api',
                'Authorization: Bearer ' . $token
            ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        // Decodificar respuesta JSON
        $persona = json_decode($response);
        // $cicloId = $request->input('ciclo_id');
    
        // Crear una nueva inscripción con los datos obtenidos de la API
        Inscripcione::create([
            'numeroDocumento' => $persona->numeroDocumento,
            'nombres' => $persona->nombres,
            'apellidoPaterno' => $persona->apellidoPaterno,
            'apellidoMaterno' => $persona->apellidoMaterno,
            'nombre_apoderado' => $request->input('nombre_apoderado'),
            'apellido_apoderado' => $request->input('apellido_apoderado'),
            'ciclo_id' => $request->input('ciclo_id'),
            'monto_a_pagar' => $request->input('monto_a_pagar'),
            'monto_pagado' => 0,
            'modalidad_pago' => $request->input('modalidad_pago'),
            'fecha_inscripcion' => $request->input('fecha_inscripcion'),
        ]);
    
        // Redireccionar a alguna vista después de crear la inscripción
        return redirect()->route('inscripciones.index')->with('success', 'Inscripción creada exitosamente.');
    }
    

    public function show(Inscripcione $inscripcione)
    {
        //
    }

    public function edit(Inscripcione $inscripcione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscripcione $inscripcione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscripcione $inscripcione)
    {
        //
    }
}
