<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class Remitidos implements FromView

{

    public function view(): View

    {

        if (request()->get('inicio')) {

            try {

                $interviews = DB::table('send_emails')

                    ->join('users', 'users.id', 'send_emails.user_id')

                    ->join('jobs', 'jobs.id', 'send_emails.job_id')

                    ->join('companies', 'companies.id', 'send_emails.company_id')

                    ->whereBetween('send_emails.send_date', [request()->get('inicio'), request()->get('fin')])

                    ->get([

                        'companies.name as company',

                        'jobs.title',

                        'users.name as candidato',

                        'users.rol',

                        'users.mobile_num',

                        'users.email',

                        'send_emails.send_date'

                    ]);
            } catch (\Exception $th) {
                dd($th->getMessage());
            }



            return view('export.vacancy', [

                'vacancys' => $interviews

            ]);
        }
    }
}
