<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::paginate(10)
        ]);
    }

    public function store(UserCreateRequest  $request){
        User::create($request->validated());
        $request->user()->save();

        return Redirect()->back();
    }
    public function update(UserUpdateRequest   $request ,User $user){
        $validatedData = $request->validated();

        if ($validatedData['email'] !== $user->email) {
            if (User::where('email', $validatedData['email'])->exists()) {
                return redirect()->back()->with('error', 'La dirección de correo electrónico ya está en uso.');
            }
        }
    
        $user->fill($validatedData);
        $user->save();
    
        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user){
        $user->delete();

        return Redirect()->back();
    }

    // public function EmployeeByDepartament(){
    //     $data = Employee::select(DB::raw('count(employees.id) as count, departaments.name'))
    //     ->join('departaments', 'departaments.id', '=', 'employees.departament_id')
    //     ->groupBy('departaments.name')
    //     ->get();

    //     return Inertia::render('Employees/Graphic', ['data' => $data]);
    // }
}
