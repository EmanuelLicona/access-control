<?php

namespace App\Http\Controllers;

use App\Exports\AccessesExport;
use App\Exports\UsersExport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('excel.index');
    }

    public function export_employees()
    {
        return Excel::download(new UsersExport(false), 'employees.xlsx');
    }

    public function export_access(Request $request)
    {
        $request->validate(
            [
                'start_date' => 'required|date|before_or_equal:now',
                'end_date' => 'required|date|after:start_date|before_or_equal:now',
                'type' => 'nullable|string|in:in,out,all',
            ],

            [
                'start_date.required' => 'Fecha de inicio requerida',
                'start_date.before_or_equal' => 'Fecha de inicio inválida',
                'end_date.required' => 'Fecha de fin requerida',
                'end_date.after' => 'Fecha de fin inválida',
                'end_date.before_or_equal' => 'Fecha de fin inválida',
                'type.in' => 'Tipo inválido',
            ]
        );

        return Excel::download(new AccessesExport($request->start_date, $request->end_date, $request->type), 'access.xlsx');
    }
}
