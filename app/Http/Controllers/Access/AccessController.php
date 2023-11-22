<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('search');

        if ($query) {
            $access = Access::with('user')
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('first_name', 'like', '%' . $query . '%')
                        ->orWhere('last_name', 'like', '%' . $query . '%')
                        ->orWhere('code', 'like', '%' . $query . '%');
                })
                ->orWhere('created_at', 'like', '%' . $query . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        if (!$query) {
            $access = Access::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        return view('access.index', compact('access'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id): View
    {
        $user = User::find($id);
        return view('access.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $user_id)
    {

        // dd($request->all());
        $request->validate(
            [
                'type' => 'required | in:a,b',
                'date' => 'required | before_or_equal:now',
            ],
            [
                'type.required' => 'El tipo de registro es requerido',
                'type.in' => 'El tipo debe ser entrada o salida',
                'date.required' => 'La fecha es requerida',
                'date.before_or_equal' => 'La fecha no puede ser mayor a la actual',
            ]
        );

        $access = new Access();
        $access->user_id = $user_id;
        $access->type = $request->type == 'a' ? 'in' : 'out';
        $access->created_at = $request->date;
        $access->save();

        return redirect()->route('access.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
