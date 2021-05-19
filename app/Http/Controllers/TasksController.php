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

        //$tasks->save();

        if ( ! $tasks->save())
        {
        //App::abort(500, 'Error');
        return redirect('/home')->with('mssg', 'Error saving task');
        }

        //User got saved show OK message
        //return Response::json(array('success' => true, 'user_added' => 1), 200);

        return redirect('/home')->with('mssg', 'Task has been uploaded');
    }
    // public function multipleStore(){

    //     $tasks = new Tasks();

    //     $tasks->tasksCase = request('case');
    //     $tasks->tasksClient = request('client');
    //     $tasks->tasksType = request('type');
    //     $tasks->tasksLawyer = request('lawyer');
    //     $tasks->tasksDate = request('date');
    //     $tasks->tasksHours = request('hours');
    //     $tasks->tasksDone = request('task');

    //     if ( ! $tasks->save())
    //     {
    //     //App::abort(500, 'Error');
    //     return redirect('/home')->with('mssg', 'Error saving task');
    //     }
    // }

    public function getClient(){

        $client = new Client();

        $client = Billing::table('cases')->where('casesName', $caseName)
                                         ->value('casesClient');

        return Redirect::to('client')->withInput();
    }
}
