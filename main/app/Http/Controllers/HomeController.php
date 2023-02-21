<?php

namespace App\Http\Controllers;

use App\Traits\Cron;
use App\Job;
use App\JobApply;
use App\FavouriteCompany;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    use Cron;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['banner', 'uploadBanner', 'activeBAnner']);
        $this->runCheckPackageValidity();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchingJobs = Job::where('functional_area_id', auth()->user()->industry_id)->paginate(7);
		$followers = FavouriteCompany::where('user_id', auth()->user()->id)->get();
        $chart='';

       
        return view('home', compact('chart', 'matchingJobs', 'followers'));
    }
    
     public function banner()
    {
        $brand = DB::table('site_settings')->where('id', 1272)
                 ->select('show_modal')->first();
                 
        return view('gestion-banner')->with('active',  $brand->show_modal );
    }
    
     public function activeBAnner()
    {
        
                DB::table('site_settings')->where('id', 1272)
                 ->update(['show_modal' => (request()->get('brand')) ? 1 : 0 ]);

             return redirect()->back()->with('success', 'ok');   
    }
    
     public function uploadBanner(Request $request)
    {
            try {
                if ($request->file('banner')) {
                    // $documento = new Documentacion();
                    $filename = '_' . time() . '.' . $request->file('banner')->getClientOriginalExtension();
                    $request->file('banner')->move(public_path() . "/file", $filename);
                    
                        DB::table('site_settings')->where('id', 1272)
                         ->update(['banner' => $filename]);

                     return redirect()->back()->with('success', 'ok');   

                    // $documento->img = $filename;
                    // $documento->save();
                    // return response('Registrado exitosamente', 200);
                }
            } catch (\Throwable $th) {
                     return redirect()->back()->with('error', $th->getMessage());   
            }
            // return response('Registrado exitosamente', 200);
        
    }

}
