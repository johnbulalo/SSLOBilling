<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases; 
use App\Models\Tasks; 

class TasksController extends Controller
{
    //
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
    public function index(){

        $cases = Cases::all();

        return view ('tasks',[
            'cases'=> $cases,
            ]);
    }

    public function store(){

        $tasks = new Tasks();

        $tasks->tasksCase = request('case');
        $tasks->tasksClient = request('client');
        $tasks->tasksType = request('type');
        $tasks->tasksLawyer = request('lawyer');
        $tasks->tasksDate = request('date');
        $tasks->tasksHours = request('hours');
        $tasks->tasksDone = request('task');

        $tasks->save();

        return redirect('/tasks');
    }

    public function getClient(){

        $client = new Client();

        $client = Billing::table('cases')->where('casesName', $caseName)->value('casesClient');

        return Redirect::to('client')->withInput();
    }
}
