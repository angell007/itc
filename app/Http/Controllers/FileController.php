<?php

namespace App\Http\Controllers;

use App\Imports\IdcardsNumbersExcel;
use Illuminate\Http\Request;

use App\Http\Requests\UploadIdCards;

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
            // return $th->getMessage();
            Session::flash('message', 'No hemos podido subir los documentos por que el archivo no es correcto!!'); 
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }
}
