<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filial;
use DB;

class FilialController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth.role:operator')->except('index','show');

	}
	
    public function index()
    {
		$filial = Filial::orderBy('updated_at', 'desc')->get();
		return view('pages.filial.filial', compact('filial'));
    }
 

    public function create()
    {
		return view('pages.filial.create_filial');
    }

    public function store(Request $request)
    {
		$this->validate(request(),[
			'name' => 'required',
			'person' => 'required',
			'phone' => 'required',
			'email'=> 'required|email',
			'address' => 'required'
		]);
		
		$filial = new Filial;
		$filial->name = $request->name;
		$filial->person = $request->person;
		$filial->phone = $request->phone;
		$filial->email = $request->email;
		$filial->address = $request->address;
		$filial->info = $request->info;
		$filial->save();
		
        return redirect('filial');
	}

 
    public function show($id)
    {
		$filial = Filial::find($id);
		//dd($filial);
		return view('pages.filial.show_filial', compact('filial'));
    }


    public function edit($id)
    {
		$filial = Filial::find($id);
        return view('pages.filial.edit_filial', compact('filial'));
    }


    public function update(Request $request, $id)
    {
		$filial = Filial::find($id);
		$filial->name = $request->name;
		$filial->person = $request->person;
		$filial->phone = $request->phone;
		$filial->email = $request->email;
		$filial->address = $request->address;
		$filial->info = $request->info;
		$filial->save();
		
		return redirect()->action('FilialController@show', ['id' => $id]);
    }
	

    public function destroy($id)
    {
        $filial = Filial::find($id);
		$filial->delete();
		return redirect('/filial');
    }
}
