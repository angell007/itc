<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Job;
use App\JobApply;
use App\Company;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now();
        $totalActiveUsers = User::where('is_active', 1)->whereMonth('created_at',  $today->month)->count();
        $totalVerifiedUsers = User::where('verified', 1)->count();
        $totalTodaysUsers = User::where('created_at', 'like', $today->toDateString() . '%')->count();
        $recentUsers = User::orderBy('id', 'DESC')->take(25)->get();
        $totalActiveJobs = Job::where('is_active', 1)->where('expiry_date', '>=', $today)->count();
        $totalFeaturedJobs = Job::where('is_active', '<>', 1)->count();
        $totalTodaysJobs = Job::where('created_at', 'like', $today->toDateString() . '%')->count();
        $recentJobs = Job::orderBy('id', 'DESC')->take(25)->get();
        $OfertaLaboral = JobApply::whereMonth('created_at',  $today->month)->count();
        $totalCompany = Company::whereMonth('created_at',  $today->month)->count();
        $contratado = JobApply::where("status", "=", "contratado")->whereMonth('created_at',  $today->month)->count();
        return view('admin.home')
            ->with('totalActiveUsers', $totalActiveUsers)
            ->with('totalVerifiedUsers', $totalVerifiedUsers)
            ->with('totalTodaysUsers', $totalTodaysUsers)
            ->with('recentUsers', $recentUsers)
            ->with('totalActiveJobs', $totalActiveJobs)
            ->with('totalFeaturedJobs', $totalFeaturedJobs)
            ->with('totalTodaysJobs', $totalTodaysJobs)
            ->with('OfertaLaboral', $OfertaLaboral)
            ->with('totalCompany', $totalCompany)
            ->with('contratado', $contratado)
            ->with('recentJobs', $recentJobs);
    }
}
