<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all()->where('is_admin', false);

        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'unique:users,email',
                'code' => 'required | unique:users,code',
                'first_name' => 'required',
                'last_name' => 'required',

                // no hay numeros en los nombres
                'first_name' => 'regex:/^[a-zA-Z]+$/',
                'last_name' => 'regex:/^[a-zA-Z]+$/',
            ],

            [
                'email.unique' => 'El email ya existe.',
                'code.unique' => 'El código ya existe.',
                'first_name.regex' => 'El nombre debe ser solo letras.',
                'last_name.regex' => 'El apellidos debe ser solo letras.',
            ]
        );

        $user = new User();
        $user->email = $request->email ?? '';
        $user->code = $request->code;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = bcrypt($request->code) ?? '';
        $user->save();

        return redirect()->route('users.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                // no hay numeros en los nombres
                'first_name' => 'regex:/^[a-zA-Z]+$/',
                'last_name' => 'regex:/^[a-zA-Z]+$/',

                'email' => 'unique:users,email,' . $id,
                'dni' => ' unique:users,dni,' . $id,
                'phone' => 'unique:users,code,' . $id,

            ],

            [
                'email.unique' => 'El email ya existe.',
                'dni.unique' => 'El dni ya existe.',
                'phone.unique' => 'El teléfono ya existe.',
                'first_name.regex' => 'El nombre debe ser solo letras.',
                'last_name.regex' => 'El apellidos debe ser solo letras.',
            ]

        );

        $user = User::find($id);
        $user->email = $request->email ?? $user->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dni = $request->dni ?? $user->dni;
        $user->phone = $request->phone ?? $user->phone;
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
