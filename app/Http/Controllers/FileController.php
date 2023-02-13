<?php

namespace App\Http\Controllers;

use App\Imports\IdcardsNumbersExcel;
use App\Imports\Trainings;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    public function uploadData()
    {
        try {
            Excel::import(new IdcardsNumbersExcel, request()->file('file')->store('temp'));
            Session::flash('message', 'Documentos subidos correctamente!!');
            Session::flash('alert-class', 'alert-success');
            return back();
        } catch (\Throwable $th) {
            Session::flash('message', 'No hemos podido subir los documentos por que el archivo no es correcto!!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }



    public function datosimporttrainings()
    {
        try {
            $id = DB::table('trainings')->insertGetId([
                'name' => request()->get('name'),
                'type' => request()->get('type'),
                'teacher' => request()->get('teacher'),
                'topic' => request()->get('topic')
            ]);

            Excel::import(new Trainings($id), request()->file('file')->store('temp'));

            Session::flash('message', 'Documentos subidos correctamente!!');

            Session::flash('alert-class', 'alert-success');

            return back();
        } catch (\Throwable $th) {

            return $th->getMessage() . $th->getLine() . $th->getFile();

            Session::flash('message', 'No hemos podido subir los documentos por que el archivo no es correcto!!');

            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }
}
