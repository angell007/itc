<?php

namespace App\Exports;

use App\Company;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class CompanysExport implements FromView
{
    public function view(): View
    {
         $today = Carbon::now();
         
         $Company = Company::whereMonth('created_at',  $today->month)->get();
         
        return view('export.staticticscompany', [
            'companys' => $Company
        ]);
    }
}