<?php

namespace App\Exports;

use App\User;
use App\Company;
use App\Job;
use App\JobApply;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;

class DatosExport implements FromView
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        
    }

    public function view(): View
    {
        try {
            
                     $today = Carbon::parse($this->a);

                     $company_registered = Company::whereMonth('created_at', '=', $today->month)->count();
            

// Número de Estudiantes /Egresados Hombres
 $hombres_registrados = User::where("gender_id", "2")->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Mujeres
 $mujeres_registradas = User::where("gender_id", "1")->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();

// Número de Estudiantes /Egresados Hombres Victimas
 $hombres_registrados_victimas = User::where("gender_id","2")->where('marital_status_id', '1' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Hombres Jovenes
 $hombres_registrados_jovenes = User::where("gender_id","2")->where('marital_status_id', '2' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Hombres PcD (Personas con discapacidad)
 $hombres_registrados_pcd = User::where("gender_id","2")->where('marital_status_id', '3' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Hombres Migrantes Venezolanos
 $hombres_registrados_venezolanos = User::where("gender_id","2")->where('marital_status_id', '4' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Hombres Grupos Etnicos
 $hombres_registrados_etnicos = User::where("gender_id","2")->where('marital_status_id', '5' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();

// Número de Estudiantes /Egresados Mujeres Victimas
 $mujeres_registrados_victimas = User::where("gender_id","1")->where('marital_status_id', '1' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Mujeres Jovenes
 $mujeres_registrados_jovenes = User::where("gender_id","1")->where('marital_status_id', '2' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Mujeres PcD (Personas con discapacidad)
 $mujeres_registrados_pcd = User::where("gender_id","1")->where('marital_status_id', '3' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Mujeres Migrantes Venezolanos
 $mujeres_registrados_venezolanos = User::where("gender_id","1")->where('marital_status_id', '4' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();
// Número de Estudiantes /Egresados Mujeres Grupos Etnicos
 $mujeres_registrados_etnicos = User::where("gender_id","1")->where('marital_status_id', '5' )->where('created_at', '>=', $this->a)->where('created_at', '<=', $this->b)->get();

// Número de Hojas de Vida Remitidas a empleadores Hombres
 $cv_hombres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
 
// Número de Hojas de Vida Remitidas a empleadores Mujeres
 $cv_mujeres= JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();

// Número de Hojas de Vida Remitidas a empleadores Hombres Victimas
 $cv_hombres_victimas = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '1' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Hombres Jovenes
 $cv_hombres_jovenes = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '2' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Hombres PcD (Personas con discapacidad)
 $cv_hombres_pcd = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '3' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Hombres Migrantes Venezolanos
 $cv_hombres_venezolanos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '4' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Hombres Grupos Etnicos
 $cv_hombres_etnicos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '5' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
 
 $cv_hombres_otro = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '21' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();

// Número de Hojas de Vida Remitidas a empleadores Mujeres Victimas
 $cv_mujeres_victimas = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '1' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Mujeres Jovenes
 $cv_mujeres_jovenes = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '2' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Mujeres PcD (Personas con discapacidad)
 $cv_mujeres_pcd = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '3' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Mujeres Migrantes Venezolanos
 $cv_mujeres_venezolanos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '4' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
// Número de Hojas de Vida Remitidas a empleadores Mujeres Grupos Etnicos
 $cv_mujeres_etnicos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '5' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();
 
 $cv_mujeres_otro = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '21' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','espera')->get();


// Número de Personas Colocadas Hombres
$contrato_hombres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas Colocadas Mujeres
$contrato_mujeres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();


// Número de Personas colocadas con enfoque diferencial Hombres Victimas
$contrato_hombres_victimas = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '1' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Hombres Jovenes
$contrato_hombres_jovenes = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '2' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Hombres PcD (Personas con discapacidad)
$contrato_hombres_pcd = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '3' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Hombres Migrantes Venezolanos
$contrato_hombres_venezolanos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '4' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Hombres Grupos Etnicos
$contrato_hombres_etnicos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '5' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();

$contrato_hombres_otro = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->where('users.marital_status_id', '21' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();

// Número de Personas colocadas con enfoque diferencial Mujeres Victimas
$contrato_mujeres_victimas = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '1' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Mujeres Jovenes
$contrato_mujeres_jovenes = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '2' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Mujeres PcD (Personas con discapacidad)
$contrato_mujeres_pcd = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '3' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Mujeres Migrantes Venezolanos
$contrato_mujeres_venezolanos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '4' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();
// Número de Personas colocadas con enfoque diferencial Mujeres Grupos Etnicos
$contrato_mujeres_etnicos = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '5' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();

$contrato_mujeres_otro = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->where('users.marital_status_id', '21' )->where('job_apply.updated_at', '>=', $this->a)->where('job_apply.updated_at', '<=', $this->b)->where('status','contratado')->get();


            // $mujeres_registradas = User::where("gender_id", "=", "1")->get();
            // $hombres_registrados = User::where("gender_id", "=", "2")->get();
            // $empresas_registradas = User::all();
            // $vacantes = job::all();
            // $cv_mujeres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->get();
            // $contrato_mujeres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->get();
            // $contrato_hombres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->get();
            // $cv_hombres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->get();

            return view('export.datos', compact(
                                                'hombres_registrados',
                                                'mujeres_registradas',
                                                'company_registered',
                                                'hombres_registrados_victimas',
                                                'hombres_registrados_jovenes',
                                                'hombres_registrados_pcd',
                                                'hombres_registrados_venezolanos',
                                                'hombres_registrados_etnicos',
                                                
                                                'mujeres_registrados_victimas',
                                                'mujeres_registrados_jovenes',
                                                'mujeres_registrados_pcd',
                                                'mujeres_registrados_venezolanos',
                                                'mujeres_registrados_etnicos',
                                                
                                                'cv_hombres',
                                                'cv_mujeres',
                                                
                                                'cv_hombres_victimas',
                                                'cv_hombres_jovenes',
                                                'cv_hombres_pcd',
                                                'cv_hombres_venezolanos',
                                                'cv_hombres_etnicos',
                                                
                                                'cv_mujeres_victimas',
                                                'cv_mujeres_jovenes',
                                                'cv_mujeres_pcd',
                                                'cv_mujeres_venezolanos',
                                                'cv_mujeres_etnicos',
                                                
                                                
                                                'contrato_hombres',
                                                'contrato_mujeres',
                                                
                                                
                                                'contrato_hombres_victimas',
                                                'contrato_hombres_jovenes',
                                                'contrato_hombres_pcd',
                                                'contrato_hombres_venezolanos',
                                                'contrato_hombres_etnicos',
                                                
                                                'contrato_mujeres_victimas',
                                                'contrato_mujeres_jovenes',
                                                'contrato_mujeres_pcd',
                                                'contrato_mujeres_venezolanos',
                                                'contrato_mujeres_etnicos',
                                                
                                                
                                                'contrato_hombres_otro',
                                                'contrato_mujeres_otro',
                                                
                                                'cv_mujeres_otro',
                                                'cv_hombres_otro'
                                                
                                                )

);
        } catch (\Throwable $th) {
            dd([$th->getMessage(), $th->getLine()]);
        }
    }
}
