<?php

namespace App\Exports;

use App\Job;
use App\JobApply;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class VacancyApplyExport implements FromView
{
    public function view(): View
    {
        

         $today = Carbon::now();
         
         $OfertaLaboral=JobApply::whereMonth('job_apply.created_at', '=', $today->month)->join('users', 'users.id', 'job_apply.user_id')->join('jobs', 'jobs.id', 'job_apply.job_id')->join('companies', 'companies.id', 'jobs.company_id')->get([
             'companies.name',
             'jobs.title',
             'companies.email'
             ]);

        return view('export.vacancy', [
            'vacancys' => $OfertaLaboral
        ]);
    }
}