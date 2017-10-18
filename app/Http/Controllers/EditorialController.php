<?php namespace biblioteca\Http\Controllers;

use biblioteca\Http\Requests;
use biblioteca\Http\Controllers\Controller;
use biblioteca\Editorial;
use Illuminate\Http\Request;
use biblioteca\Http\Requests\CreateEditorialRequest;
use biblioteca\Http\Requests\EditEditorialRequest;
use Illuminate\Support\Facades\Session;

class EditorialController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $editoriales= Editorial::paginate();
        return view('editorial.index',compact('editoriales'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('editorial.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateEditorialRequest $request)
	{
        $editorial=new Editorial($request->all());
        $editorial->save();
        return redirect()->route('editorial.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $editorial= Editorial::findOrFail($id);
        return view('editorial.edit',compact('editorial'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditEditorialRequest $request,$id)
	{

        $editorial= Editorial::findOrFail($id);
        $editorial->fill($request->all());
        $editorial->save();
        return redirect()->route('editorial.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Editorial::destroy($id);
        Session::flash('message','El registro fue eliminado');
        return redirect()->route('editorial.index');
	}

}
