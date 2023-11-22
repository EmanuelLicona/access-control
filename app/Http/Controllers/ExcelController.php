<?php

namespace App\Http\Controllers;

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
}
