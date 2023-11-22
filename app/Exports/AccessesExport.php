<?php

namespace App\Exports;

use App\Models\Access;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AccessesExport implements FromView
{

    public function __construct(
        private readonly string $from,
        private readonly string $to,
        private readonly string $type
    ) {
    }


    public function view(): View
    {



        if ($this->type == 'all') {
            $access = Access::with('user')
                ->orderBy('created_at', 'asc')
                ->whereBetween('created_at', [$this->from, $this->to])
                ->get();
        } else {

            $access = Access::with('user')
                ->orderBy('created_at', 'asc')
                ->whereBetween('created_at', [$this->from, $this->to])
                ->where('type', $this->type)
                ->get();
        }

        return view('access.export_access', compact('access'));
    }
}
