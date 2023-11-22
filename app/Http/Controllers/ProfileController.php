<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('profile.index', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'first_name' => 'regex:/^[a-zA-Z]+$/',
                'last_name' => 'regex:/^[a-zA-Z]+$/',

                'email' => 'unique:users,email,' . $id,
                'dni' => ' unique:users,dni,' . $id,
                'phone' => 'unique:users,code,' . $id,

                'code' => 'unique:users,code,' . $id . '|min:4|max:4',

            ],

            [
                'email.unique' => 'El email ya existe.',
                'dni.unique' => 'El dni ya existe.',
                'phone.unique' => 'El teléfono ya existe.',
                'first_name.regex' => 'El nombre debe ser solo letras.',
                'last_name.regex' => 'El apellidos debe ser solo letras.',
                'code.unique' => 'El código ya pertenece a otro empleado.',
                'code.min' => 'El código debe ser de 4 caracteres.',
                'code.max' => 'El código debe ser de 4 caracteres.',
            ]

        );

        $user = User::find($id);
        $user->email = $request->email ?? $user->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->code = $request->code ?? $user->code;
        $user->dni = $request->dni ?? $user->dni;
        $user->phone = $request->phone ?? $user->phone;
        $user->save();

        session()->flash('success', 'Datos actualizados correctamente.');

        return redirect()->route('profile.index');
    }

    public function chage_password(Request $request, string $id)
    {
        $request->validate(
            [
                'password' => 'required|confirmed|min:6',
                'old_password' => 'required',
            ],
            [
                'password.confirmed' => 'Las contraseñas no coinciden.',
                'password.min' => 'La contraseña debe ser de al menos 8 caracteres.',
                'old_password.required' => 'La contraseña actual es obligatoria.',
            ]
        );

        $user = User::find($id);

        if (!password_verify($request->old_password, $user->password)) {
            session()->flash('error', 'La contraseña actual no coincide.');
            return redirect()->route('profile.index');
        }

        $user->password = bcrypt($request->password);
        $user->save();
        session()->flash('success', 'Contraseña actualizada correctamente.');
        return redirect()->route('profile.index');
    }
}
