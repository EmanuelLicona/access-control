<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:4',
        ]);

        $user = User::where('code', $request->code)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Codigo no valido',
            ], 404);
        }

        $acess = new Access();
        $acess->user_id = $user->id;
        $acess->save();

        return response()->json([
            'message' => 'Acceso registrado',
        ]);
    }
}
