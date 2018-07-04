<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;
use Illuminate\Support\Facades\Auth;
use DB;

class NewsController extends Controller
{
    public function __construct()
	{
		
		$this->middleware('auth.role:operator')->except('index','show');
		
	}
	
	public function index()
    {	
		$news = News::orderBy('created_at', 'desc')->get();
		return view('pages.news.news', compact('news'));
    }
	
	public function show($id)
    {
		$news = News::find($id);
		return view('pages.news.show_news', compact('news'));
    }
	
	public function create()
    {
		return view('pages.news.create_news');
    }
	
	public function store(Request $request)
    {
		$this->validate(request(),[
			'title' => 'required',
			'description'=> 'required',
			'content'=> 'required'
		]);
		
		$news = new News;
		$news->title = $request->title;
		$news->description = $request->description;
		$news->content = $request->content;
		$news->operator_id = Auth::user()->operators->id;
		$news->save();
    
		return redirect('/news');
	}
	
	public function edit($id)
    {
		$news = News::find($id);
        return view('pages.news.edit_news', compact('news'));
    }
	
	public function update(Request $request, $id)
    {
        
		$news = News::find($id);
		$news->title = $request->title;
		$news->description = $request->description;
		$news->content = $request->content;
		$news->operator_id = Auth::user()->operators->id;
		$news->save();
		
		return redirect()->action('NewsController@show', ['id' => $id]);
		
		
    }
	
	public function destroy($id)
    {
        $news = News::find($id);
		$news->delete();
		return redirect('/news');
    }
	
}
