<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\User;
use App\Company;
use App\Job;
use App\Exports\InvoicesExport;
use App\Exports\CompanysExport;
use App\Exports\JobsExport;

class ReportController extends Controller
{

    public function showView()
    {
      return view('reports.reports');
      
    }
    
    public function download()
    {

        $data = [];
        
        switch(request()->get('tipo_reporte')){
            case 1:
                
                 $data = $this->getStudents();
                 return Excel::download(new InvoicesExport($data), 'Estudiantes' . '.xlsx');
                 
            case 2:
                
                 $data = $this->getCompanys();
                 return Excel::download(new CompanysExport($data), 'Compañias' . '.xlsx');
                 
            case 3:
                
                 $data = $this->getJobs();
                 return Excel::download(new JobsExport($data), 'Empleos' . '.xlsx');
                 
            case 4:
                
                 $data = $this->getEgresados();
                 return Excel::download(new InvoicesExport($data), 'Egresados' . '.xlsx');
        }
    }
    
    
    public function getStudents(){
        
        return  User::
              leftJoin('countries', 'countries.id', 'users.country_id')
            ->leftJoin('cities', 'cities.id', 'users.city_id')
            ->leftJoin('states', 'states.id', 'users.state_id')
            ->leftJoin('industries', 'industries.id', 'users.industry_id')
            ->leftJoin('career_levels', 'career_levels.id', 'users.career_level_id')
            ->leftJoin('profile_skills', 'profile_skills.user_id', 'users.id')
            ->leftJoin('job_skills', 'job_skills.id', 'profile_skills.job_skill_id')
            ->leftJoin('functional_areas', 'functional_areas.id', 'users.functional_area_id')
            ->where('rol','Estudiante')
            
            ->select(
                    [
                        'users.id',
                        'users.first_name',
                        'users.middle_name',
                        'users.first_lastname',
                        'users.second_lastname',
                        'users.email',
                        'users.national_id_card_number',
                        'users.password',
                        'users.phone',
                        'users.country_id',
                        'users.state_id',
                        'users.city_id',
                        'users.industry_id',
                        'users.rol',
                        'users.is_immediate_available',
                        'users.num_profile_views',
                        'users.is_active',
                        'users.verified',
                        'users.created_at',
                        'users.updated_at',
                        'cities.city',
                        'states.state',
                        'industries.industry',
                        'career_levels.career_level',
                        DB::raw("CONCAT_WS('|', `job_skills`.`job_skill`) As 'skill'"),
                        'functional_areas.functional_area',
                    ]
                )->when(request()->get('inicio') && request()->get('fin'), function($q){
                        $q->whereBetween('users.created_at', [request()->get('inicio'), request()->get('fin')]);
                    })
                    ->groupBy('users.id')
                    ->get();
                
    }
    
    public function getEgresados(){
        
        return  User::
              leftJoin('countries', 'countries.id', 'users.country_id')
            ->leftJoin('cities', 'cities.id', 'users.city_id')
            ->leftJoin('states', 'states.id', 'users.state_id')
            ->leftJoin('industries', 'industries.id', 'users.industry_id')
            ->leftJoin('career_levels', 'career_levels.id', 'users.career_level_id')
            ->leftJoin('profile_skills', 'profile_skills.user_id', 'users.id')
            ->leftJoin('job_skills', 'job_skills.id', 'profile_skills.job_skill_id')
            ->leftJoin('functional_areas', 'functional_areas.id', 'users.functional_area_id')
            ->where('rol','Egresado')
            ->select(
                    [
                        'users.id',
                        'users.first_name',
                        'users.middle_name',
                        'users.second_lastname',
                        'users.first_lastname',
                        'users.email',
                        'users.national_id_card_number',
                        'users.password',
                        'users.phone',
                        'users.country_id',
                        'users.state_id',
                        'users.city_id',
                        'users.industry_id',
                        'users.rol',
                        'users.is_immediate_available',
                        'users.num_profile_views',
                        'users.is_active',
                        'users.verified',
                        'users.created_at',
                        'users.updated_at',
                        'cities.city',
                        'states.state',
                        'industries.industry',
                        'career_levels.career_level',
                        // 'job_skills.job_skill',
                         DB::raw("GROUP_CONCAT('--', `job_skills`.`job_skill`) As 'skill'"),
                        'functional_areas.functional_area',
                    ]
                )->when(request()->get('inicio') && request()->get('fin'), function($q){
                        $q->whereBetween('users.created_at', [request()->get('inicio'), request()->get('fin')]);
                    })
                    ->groupBy('users.id')
                    ->get();
                
    }
    
    public function getCompanys(){
        
       
        return  Company::
              join('cities', 'cities.id', 'companies.city_id')
            ->join('states', 'states.id', 'companies.state_id')
            ->join('industries', 'industries.id', 'companies.industry_id')
            ->select([
            'companies.id',
            'companies.name',
            'companies.email',
            'companies.password',
            'companies.ceo',
            'companies.industry_id',
            'companies.ownership_type_id',
            'companies.description',
            'companies.location',
            'companies.no_of_offices',
            'companies.website',
            'companies.no_of_employees',
            'companies.established_in',
            'companies.fax',
            'companies.phone',
            'companies.logo',
            'companies.country_id',
            'companies.state_id',
            'companies.city_id',
            'companies.is_active',
            'companies.is_featured',
            'companies.camara_comercio',
            'cities.city',
            'states.state',
            'industries.industry',
        ])
        ->when(request()->get('inicio') && request()->get('fin'), function($q){
                        $q->whereBetween('companies.created_at', [request()->get('inicio'), request()->get('fin')]);
                    })
        ->get();
                
    }
    
    public function getJobs(){
        
       
           return Job::join('companies', 'companies.id', 'jobs.company_id')->select([
            'jobs.id', 
            'jobs.company_id', 
            'jobs.title', 
            'jobs.description', 
            'jobs.country_id', 
            'jobs.state_id', 
            'jobs.city_id', 
            'jobs.is_freelance', 
            'jobs.career_level_id', 
            'jobs.salary_from', 
            'jobs.salary_to', 
            'jobs.hide_salary', 
            'jobs.functional_area_id', 
            'jobs.job_type_id', 
            'jobs.job_shift_id', 
            'jobs.num_of_positions', 
            'jobs.gender_id', 
            'jobs.expiry_date', 
            'jobs.degree_level_id', 
            'jobs.job_experience_id', 
            'jobs.is_active', 
            'jobs.is_featured',
            'companies.name'
        ])
        ->when(request()->get('inicio') && request()->get('fin'), function($q){
                        $q->whereBetween('jobs.created_at', [request()->get('inicio'), request()->get('fin')]);
                    })
        ->get();
                
    }
}