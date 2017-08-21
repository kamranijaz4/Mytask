<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use App\quesionair;
use App\Quiz;
use App\student;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('home');
    }
    public function Questionair()
    {
      $user=quesionair::all();
      
      return view('Questionair',compact('user'));
    }
    public function showCount($id)
    {
      $ss = DB::table('quizzes')->where('id',$id)->count();
      return view('showCount',compact('ss'));
    }
    
    public function addQuestion()
    {
      return view('addQuestion');
    }
    public function Result()
    {
      return view('Result');
    }
    public function create()
    {
      return view('create');
    }
    public function destroy($id)
    {
      $user = quesionair::where('id',$id)->first();
      
      if ($user != null) {
        $user->delete();
        return redirect('/Questionair');
        
        
      }
    }
    public function store()
    {
      $user=new quesionair;
      $user->name=Input::get('name');
      $user->Time=Input::get('Time');
      $user->option=Input::get('option');
      $user->publish =Input::get('publish');
      $user->save();
      return "Data saved.";

    }
    public function edit($id)
    {
     
      $user = quesionair::find($id);
      return view('Questionair',compact('user'));
    } 
    public function update(Request $request, $id)
    {
      $users = quesionair::find($id);
      $users ->name = $request->input('name');
      $users ->Time = $request->input('Time');
      $users ->option = $request->input('option');
      $users ->publish = $request->input('publish');

      $users -> update();
      return redirect('Questionair');
    } 
    public function storeData($id)
    { 
      $quiz = Input::get('Question', []) ;
      $quiz = Input::get('Answer', []); 

      DB::table('quizzes')->whereIn('id',$ids);
      
      $quiz->save();
      return 'SAved';
    }
    public function mcq()
    {
      return view('MCQ');
    }
    public function text()
    {
      return view('text');
    }
    public function storetext(Request $request,$id)
{
   
        $student = new Quiz;
        $student->id=$id;
        $student->Question = Input::get('Question');
        $student->Answer = Input::get('Answer');
        $student->save();
    
    return view('Text');
}
   public function showResult()
   {
     $user=Quiz::all();
     return view('showResult',compact('user'));
   }
  }
