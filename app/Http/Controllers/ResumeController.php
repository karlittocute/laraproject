<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Resume;
use App\ErrorsInResume;
use App\Filial;
use DB;
use Illuminate\Support\Facades\Input; 

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
	{
		
		$this->middleware('auth.role:applicant')->except(['index','show','publish','deny']);
		$this->middleware('auth.role:operator')->only('publish','deny');
		$this->middleware('auth.record:resumes')->only('create','store');
		$this->middleware('auth.access:resumes')->only('edit','update','destroy');
		
	}
	
    public function index(Request $request)
    {
        /*
		$resume = Resume::orderBy('updated_at', 'desc')->get();
		return view('pages.resume.resume', compact('resume'));
		*/
		if (empty($request->field) and empty($request->name)){
			return view('pages.resume.resume', ['resumes'=> Resume::orderBy('updated_at', 'desc')->paginate(7)]);
		}
		else { 
			if (empty($request->field) ){
				$name = '%' . strval($request->name) . '%';
				$resumes = Resume::orderBy('updated_at', 'desc')->where([
					['vacancy', 'like', $name ]
					])->paginate(7);
				return view('pages.resume.resume', compact('resumes'));
			}
			elseif (empty($request->name) ) {
				$name = '%' . strval($request->name) . '%';
				$resumes = Resume::orderBy('updated_at', 'desc')->where([
					['vacancyField', '=', $request->field ]
					])->paginate(7);
				return view('pages.resume.resume', compact('resumes'));
			}
			else {
				$name = '%' . strval($request->name) . '%';
				$resumes = Resume::orderBy('updated_at', 'desc')->where([
					['vacancy', 'like', $name ],
					['vacancyField', '=', $request->field ]
					])->paginate(7);
				return view('pages.resume.resume', compact('resumes'));
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
		$filial = Filial::orderBy('updated_at', 'desc')->get();
		return view('pages.resume.create_resume', compact('filial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		auth()->user()->new_resume(
				new Resume($request->all([]))
			);
		
        return redirect('resume');

		
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
		return view('pages.resume.show_resume', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $resume_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$filial = Filial::orderBy('updated_at', 'desc')->get();
		$resume = Resume::find($id);
        return view('pages.resume.edit_resume', compact('resume','filial'));
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
		$resume =  Resume::find($id);
		$resume->fill($data);
		$resume->public = 1;
		$resume->active = 0;
		$resume->save();
		
		return redirect()->action('ResumeController@show', ['id' => $id]);
    }
	
	public function publish(Request $request, $id)
    {
		$resume = Resume::find($id);
		$resume->active = 1;
		$resume->public = 0;
		$operator = $request->user()->operators;
		$resume->operatorId = $operator->id;
		$resume->save();
		
		return redirect()->action('ResumeController@show', ['id' => $id]);
		  
    }
	
	
	public function deny(Request $request, $id)
    {
		$resume = Resume::find($id);
		$resume->active = 2;
		$resume->public = 1;
		$operator = $request->user()->operators;
		$resume->operatorId = $operator->id;
		$resume->save();
		
		//если в таблице ErrorsInResume нет записи про резюме, то создается новая 
		$error = ErrorsInResume::updateOrCreate(
			['resume_id' => $id], 
			['reason' => $request->reason]);
		
		return redirect()->action('ResumeController@show', ['id' => $id]);
		  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$resume = Resume::find($id);
		$resume->delete();
		return redirect('/resume');
        /**
		$resume = Resume::find($id);
		$resume->active = 0;
		$resume->public = 1;
		$resume->save();
		return redirect()->action('ResumeController@index');
		**/
    }
}
