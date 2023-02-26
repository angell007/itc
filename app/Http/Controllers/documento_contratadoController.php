<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\documento_contratado;
use Illuminate\Http\Request;
use App\JobApply;

class documento_contratadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */


public function contrato(Request $request){

    $requestData = $request->all();
        
    documento_contratado::create($requestData);

    $mm = JobApply::findOrFail($request->id_job);
    $mm->status="contratado";
    $mm->save();

    return $request->id_job;

}



public function rechazar(Request $request){



    $mm = JobApply::findOrFail($request->id_job);
    $mm->status="rechazado";
    $mm->save();

    return $request->id_job;

}



    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $documento_contratado = documento_contratado::with('company', 'candidate')->where('id_empresa', 'LIKE', "%$keyword%")
                ->orWhere('id_candidato', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('notas', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $documento_contratado = documento_contratado::with('company', 'candidate')->latest()->paginate($perPage);
        }

        return view('admin.documento_contratado.index', compact('documento_contratado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.documento_contratado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        documento_contratado::create($requestData);

        return redirect('admin/documento_contratado')->with('flash_message', 'documento_contratado added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $documento_contratado = documento_contratado::findOrFail($id);

        return view('admin.documento_contratado.show', compact('documento_contratado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $documento_contratado = documento_contratado::findOrFail($id);

        return view('admin.documento_contratado.edit', compact('documento_contratado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $documento_contratado = documento_contratado::findOrFail($id);
        $documento_contratado->update($requestData);

        return redirect('admin/documento_contratado')->with('flash_message', 'documento_contratado updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        documento_contratado::destroy($id);

        return redirect('admin/documento_contratado')->with('flash_message', 'documento_contratado deleted!');
    }
}
