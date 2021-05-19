<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Tasks::where('tasksLawyer',Auth::user()->name)
                        ->orderBy('created_at', 'DESC')
                        ->get();
        $casesName = Tasks::select('tasksCase')
                        ->where('tasksLawyer',Auth::user()->name)
                        ->distinct()
                        ->get();

        return view ('home',[
            'tasks'=> $tasks,
            'casesName'=>$casesName,
            ]);
        //return view('home');
    }
    public function filterTask(Request $filter)
    {
        $case = $filter->input('case');
        $type = $filter->input('type');
        $date = $filter->input('date');

        // $tasks = Tasks::where('tasksLawyer',Auth::user()->name)
        //                 ->where('tasksCase', $case)
        //                 ->orWhere('tasksType','=', $type)
        //                 ->Where('tasksType','=', $type)
        //                 ->orWhere('tasksDate', $date)
        //                 ->orderBy('created_at', 'DESC')
        //                 ->get();
        $tasks = Tasks::query()
                        ->where('tasksLawyer',Auth::user()->name)
                        ->when($filter->filled('case'), function ($query) use ($case){
                            return $query->where('tasksCase', $case);
                        })
                        ->when($filter->filled('type'), function ($query) use ($type) {
                            return $query->where('tasksType', $type);
                        })
                        ->when($filter->filled('date'), function ($query) use ($date){
                            return $query->where('tasksDate', 'LIKE', $date.'%');
                        })
                        ->get();
                        
        $casesName = Tasks::select('tasksCase')
                        ->where('tasksLawyer',Auth::user()->name)
                        ->distinct()
                        ->get();

        return view ('search',[
            'tasks'=> $tasks,
            'casesName'=>$casesName,
            ]);
        //return view('home');
    }
}
