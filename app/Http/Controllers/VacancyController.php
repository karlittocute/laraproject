<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use DB;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
	{
		$this->middleware('auth.role:company')->except(['index','show']);
		$this->middleware('existence.company')->only('create');
	}
	
    public function index(Request $request)
    {
		if (empty($request->field) and empty($request->name)){
			return view('pages.vacancy.vacancy', ['vacancies'=> Vacancy::orderBy('updated_at', 'desc')->paginate(7)]);
		}
		else { 
			if (empty($request->field) ){
				$name = '%' . strval($request->name) . '%';
				$vacancies = Vacancy::where([
					['name', 'like', $name ]
					])->paginate(7);
				return view('pages.vacancy.vacancy', compact('vacancies'));
			}
			elseif (empty($request->name) ) {
				$name = '%' . strval($request->name) . '%';
				$vacancies = Vacancy::orderBy('updated_at', 'desc')->where([
					['field', '=', $request->field ]
					])->paginate(7);
				return view('pages.vacancy.vacancy', compact('vacancies'));
			}
			else {
				$name = '%' . strval($request->name) . '%';
				$vacancies = Vacancy::orderBy('updated_at', 'desc')->where([
					['name', 'like', $name ],
					['field', '=', $request->field ]
					])->paginate(7);
				return view('pages.vacancy.vacancy', compact('vacancies'));
			}
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vacancy.create_vacancy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$company = auth()->user()->companies;
		$company_id = $company->id;
		$vacancy = new Vacancy;
		$vacancy->new_vacancy($vacancy,$company_id,$request->all());
        return redirect('vacancy');
		
	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::find($id);
		//DB::table('vacancies')->find($id);
        return view ('pages.vacancy.show_vacancy', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::find($id);
        return view('pages.vacancy.edit_vacancy', compact('vacancy'));
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
        $data = $request->except(['_token','_method', 'submitResume']);
		$vacancy =  Vacancy::find($id);
		$vacancy->fill($data);
		$vacancy->active = 1;
		$vacancy->save();
		
		return redirect()->action('VacancyController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);
		$vacancy->delete();
		return redirect('/vacancy');
    }
}
