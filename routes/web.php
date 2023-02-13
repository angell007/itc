<?php

use App\Company;
use App\Job;
use App\Models\template_contrato;
use App\User;
use App\JobApply;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\IndexController;



Route::get('/clear-cache', function () {

  $exitCode = Artisan::call('config:clear');

  $exitCode = Artisan::call('cache:clear');

  $exitCode = Artisan::call('config:cache');

  return 'DONE'; //Return anything

});


Route::get('/pass', function (Request $request) {


  return Hash::make('Bolsa2021++');

  $mujeres_registradas = User::where("gender_id", "=", "1")->get();
  $hombres_registrados = User::where("gender_id", "=", "2")->get();
  $empresas_registradas = User::all();
  $vacantes = job::all();
  $cv_mujeres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->get();
  $contrato_mujeres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "1")->get();
  $contrato_hombres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("job_apply.status", "=", "contratado")->where("users.gender_id", "=", "2")->get();
  $cv_hombres = JobApply::join("users", "users.id", "=", "job_apply.user_id")->where("users.gender_id", "=", "1")->get();

  dd([

    $mujeres_registradas,
    $hombres_registrados,
    $empresas_registradas,
    $vacantes,
    $cv_mujeres,
    $contrato_mujeres,
    $contrato_hombres,
    $cv_hombres

  ]);

  return hash::make('Bolsa2021++');
});

Route::get('fetch-documents', array_merge(['uses' => 'Admin\UserController@fetchUsersDataDocuments']))->name('fetch.data.documents');


Route::get('/send-mail', function (Request $request) {

  $formato = template_contrato::find(request()->get('template'));

  $empresa = Company::find(request()->get('company'));

  $estudiante = User::with('profileEducation')->find(request()->get('user'));


  $formato->html =  preg_replace("/@nombre_empresa@/",  $empresa->name, $formato->html);
  $formato->html =  preg_replace("/@nit_empresa@/",  '', $formato->html);
  $formato->html =  preg_replace("/@nombre_estudiante@/",  $estudiante->name . ' ' . $estudiante->last_name, $formato->html);
  $formato->html =  preg_replace("/@documento_estudiante@/",  $estudiante->national_id_card_number, $formato->html);

  if (isset($estudiante->profileEducation->institution)) {
    $formato->html =  preg_replace("/@instituto@/",  $estudiante->profileEducation->institution, $formato->html);
  } else {
    $formato->html =  preg_replace("/@instituto@/", '', $formato->html);
  }
  if (isset($estudiante->profileEducation->degree_title)) {
    $formato->html =  preg_replace("/@estudio@/",  $estudiante->profileEducation->degree_title, $formato->html);
  } else {
    $formato->html =  preg_replace("/@estudio@/",  '', $formato->html);
  }

  $formato->html =  preg_replace("/@modalidad@/",  '', $formato->html);

  $formato->html =  preg_replace("/@fecha@/",  Carbon::now('America/Bogota')->locale('es')->isoFormat('LLLL'), $formato->html);

  $data = ['estudiante' => $estudiante, 'empresa' => $empresa, 'formato' => $formato];

  $pdf = \App::make('dompdf.wrapper');
  $pdf->setPaper("A4", "portrait");
  $pdf = PDF::loadView('plantilla.base', compact('formato', 'empresa', 'estudiante'));

  Mail::send('plantilla.mail', $data, function ($message) use ($data, $pdf) {

    try {
      $message->to($data["empresa"]['email'], $data["empresa"]['email'])
        ->subject($data["formato"]['nombre'])
        ->attachData($pdf->output(), "carta.pdf");
    } catch (\Exception $th) {
      return Redirect::back()->withErrors(['msg', 'No se ha podido enviar el email correctamente']);

      dd($th->getMessage());
    }
  });

  return redirect()->back()->with('success', 'Email enviado correctamente');
})->name('send-mail');

$real_path = realpath(__DIR__) . DIRECTORY_SEPARATOR . 'front_routes' . DIRECTORY_SEPARATOR;


/* * ******** IndexController ************ */

// Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/', 'IndexController@index')->name('index');

Route::post('set-locale', 'IndexController@setLocale')->name('set.locale');

/* * ******** HomeController ************ */

Route::get('home', 'HomeController@index')->name('home');

Route::get('admin/banner', 'HomeController@banner')->name('banner');
Route::post('admin/banner', 'HomeController@uploadBanner')->name('banner');
Route::post('admin/banner-active', 'HomeController@activeBAnner')->name('banner-active');

/* * ******** TypeAheadController ******* */

Route::get('typeahead-currency_codes', 'TypeAheadController@typeAheadCurrencyCodes')->name('typeahead.currency_codes');

/* * ******** FaqController ******* */

Route::get('faq', 'FaqController@index')->name('faq');

/* * ******** CronController ******* */

Route::get('check-package-validity', 'CronController@checkPackageValidity');

/* * ******** Verification ******* */

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');

Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::get('company-email-verification/error', 'Company\Auth\RegisterController@getVerificationError')->name('company.email-verification.error');

Route::get('company-email-verification/check/{token}', 'Company\Auth\RegisterController@getVerification')->name('company.email-verification.check');

/* * ***************************** */

// Sociallite Start

// OAuth Routes

Route::get('login/jobseeker/{provider}', 'Auth\LoginController@redirectToProvider');

Route::get('login/jobseeker/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/employer/{provider}', 'Company\Auth\LoginController@redirectToProvider');

Route::get('login/employer/{provider}/callback', 'Company\Auth\LoginController@handleProviderCallback');

// Sociallite End

/* * ***************************** */

Route::post('tinymce-image_upload-front', 'TinyMceController@uploadImage')->name('tinymce.image_upload.front');



Route::get('cronjob/send-alerts', 'AlertCronController@index')->name('send-alerts');



Route::post('subscribe-newsletter', 'SubscriptionController@getSubscription')->name('subscribe.newsletter');



/* * ******** OrderController ************ */

include_once($real_path . 'order.php');

/* * ******** CmsController ************ */

include_once($real_path . 'cms.php');

/* * ******** JobController ************ */

include_once($real_path . 'job.php');

/* * ******** ContactController ************ */

include_once($real_path . 'contact.php');

/* * ******** CompanyController ************ */

include_once($real_path . 'company.php');

/* * ******** AjaxController ************ */

include_once($real_path . 'ajax.php');

/* * ******** UserController ************ */

include_once($real_path . 'site_user.php');

/* * ******** User Auth ************ */

Auth::routes();

/* * ******** Company Auth ************ */

include_once($real_path . 'company_auth.php');

/* * ******** Admin Auth ************ */

include_once($real_path . 'admin_auth.php');


/* * ********************************** Custom routes  ************************************************** */

/* * ******** routes to upload file of idCards ************ */

include_once($real_path . 'custom/files.php');


// Route::get('/pruebas',  function () {
//   return Hash::make('secret');
// });


Route::get('/reports', 'ReportController@showView')->name('reports');
Route::post('/download/reports', 'ReportController@download')->name('download.reports');

Route::get('/gestion-permisos', 'Admin\GestionController@gestionar')->name('gestion-permisos');
Route::post('/save-permissions', 'Admin\GestionController@store')->name('save-permissions');

Route::get('blog', 'BlogController@index')->name('blogs');

Route::get('blog/search', 'BlogController@search')->name('blog-search');

Route::get('blog/{slug}', 'BlogController@details')->name('blog-detail');

Route::get('/blog/category/{blog}', 'BlogController@categories')->name('blog-category');

Route::get('/company-change-message-status', 'CompanyMessagesController@change_message_status')->name('company-change-message-status');
Route::get('/seeker-change-message-status', 'Job\SeekerSendController@change_message_status')->name('seeker-change-message-status');

Route::get('/sitemap', 'SitemapController@index');

Route::get('/sitemap/companies', 'SitemapController@companies');

Route::get('/donwload-statictics-download',  'ExportController@download')->name('download');

Route::get('/donwload-camara/{company?}',  'Company\CompanyController@download');
Route::get('/donwload-camara-by-admin/{company?}',  'Admin\CompanyController@download');
// Route::get('/donwload-cv/{company?}',  'Admin\CompanyController@download' );
Route::get('/download-cv/{file?}/{title?}/{user}',  function ($a, $b, $c) {

  if (Auth::check()) {

    $res = User::with(['profileCvs' => function ($q) use ($b) {
      $q->where('title', $b);
    }])->find($c);

    if ($res->profileCvs && count($res->profileCvs) > 0) {
      return response()->download(public_path() . '/cvs/' . $a);
    }
  }
});
Route::get('/download-cv-on-candidate/{file?}/{user}/{jobs}',  function ($a, $c, $d) {




  if (Auth::guard('company')->check()) {

    $jobs = Job::findOrFail($d);

    if ($jobs->company_id == Auth::guard('company')->user()->id) {

      if (in_array($c, $jobs->getAppliedUserIdsArray())) {
        return response()->download(public_path() . '/cvs/' . $a);
      }
    }
  }

  abort(404);
});


Route::post('contratar_emp', 'documento_contratadoController@contrato');
Route::post('rechazar_emp', 'documento_contratadoController@rechazar');

Route::resource('admin/documento_contratado', 'documento_contratadoController');
Route::resource('admin/documento_pasantias', 'documento_pasantiasController');
