<?php

namespace App\Http\Controllers;

use App\Exports\UserTodayExport;
use App\Exports\UserActiveExport;
use App\Exports\UserVerifiedExport;
use App\Exports\VacancyTodayExport;
use App\Exports\VacancyActiveExport;
use App\Exports\VacancyInactiveExport;
use App\Exports\VacancyApplyExport;
use App\Exports\VacancyContractExport;
use App\Exports\CompanysExport;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function download()
    {
        try {
            

            switch(request()->get('type')){
                case 1:
                    return Excel::download(new UserTodayExport, 'usersToday.xlsx');
                    break;
                case 2:
                    return Excel::download(new UserActiveExport, 'usersToday.xlsx');
                    break;
                case 3:
                    return Excel::download(new UserVerifiedExport, 'usersToday.xlsx');
                    break;
                case 4:
                    return Excel::download(new CompanysExport, 'usersToday.xlsx');
                    break;
                case 5:
                    return Excel::download(new VacancyTodayExport, 'usersToday.xlsx');
                    break;
                case 6:
                    return Excel::download(new VacancyActiveExport, 'usersToday.xlsx');
                    break;
                case 7:
                    return Excel::download(new VacancyInactiveExport, 'usersToday.xlsx');
                    break;
                case 8:
                    return Excel::download(new VacancyApplyExport, 'usersToday.xlsx');
                    break;
                case 9:
                    return Excel::download(new VacancyContractExport, 'usersToday.xlsx');
                    break;
            }
            // return back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
