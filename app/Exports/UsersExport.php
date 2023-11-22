<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

// class UsersExport implements FromCollection
class UsersExport implements FromView
{
    // public function collection()
    // {
    //     return User::all();
    // }

    public function __construct(
        private readonly bool $is_admin = false,
    ) {
    }

    public function view(): View
    {

        if ($this->is_admin) {
            return view('excel.export_users', [
                'users' => User::all()
            ]);
        }

        return view('excel.export_users', [
            'users' => User::where('is_admin', false)->get()
        ]);
    }
}
