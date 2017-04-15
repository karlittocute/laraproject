<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Resume;
 
use DB;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
	{
		$this->middleware('auth.role:applicant')->except(['index','show']);
	}
	
    public function index()
    {
        $resume = Resume::orderBy('updated_at', 'desc')->get();
		return view('pages.resume', compact('resume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('pages.createresume');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        $resume = new Resume;
    
		//$resume->name = request('name');
		//$resume->save();
		
		Resume::create(request()->all()); //Эта строчка будет отправлять все данные из формы в БД
		dd(request()->all()); //  Эта строчка выводит данные из формы на экран
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $resume_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resume = Resume::find($id);
		//dd($resume);
		return view('pages.showresume', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $resume_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('welcome');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
