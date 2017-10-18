<?php namespace biblioteca\Http\Controllers;

use biblioteca\Http\Requests;
use biblioteca\Http\Controllers\Controller;
use biblioteca\Http\Requests\CreateRecursoRequest;
use biblioteca\Http\Requests\EditRecursoRequest;
use biblioteca\Recurso;
use biblioteca\Editorial;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class recursoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$recursos = Recurso::paginate();
        return view('recurso.index',compact('recursos'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('recurso.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRecursoRequest $request)
	{
        $recurso=new Recurso($request->all());
        $recurso->save();
        return redirect()->route('recurso.index');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $recurso= Recurso::findOrFail($id);
        return view('recurso.edit',compact('recurso'));

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditRecursoRequest $request,$id)
	{

        $recurso= Recurso::findOrFail($id);
        $recurso->fill($request->all());
        $recurso->save();
        return redirect()->route('recurso.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Recurso::destroy($id);
        Session::flash('message','El registro fue eliminado');
        return redirect()->route('recurso.index');

    }
}
