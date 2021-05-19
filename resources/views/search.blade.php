@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">            
    <section class="page-section" id="task">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase" style="padding-top:3%;color: #fff;">Tasks List</h2>
                        <div class="notification">
                            <p class="mssg">{{ session('mssg') }}</p>
                        </div>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>
                    <form id="filterTask" action="/search" method="GET" name="filterTask" novalidate>                        
                        <div class="row align-items-stretch mb-5">
                            <div style="margin: 5px">
                                <div class="form-group">
                                    <select class="form-control" name="case" id="case" type="text" placeholder="caseName *" required data-validation-required-message="Please select Type.">
                                        <option value="" disabled selected required>Select Case</option>
                                        @foreach ($casesName as $caseName)
                                        <option value="{{ $caseName->tasksCase }}">{{ $caseName->tasksCase }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="margin: 5px">
                                <div class="form-group mb-md-0">
                                    <select class="form-control" name="type" id="type" type="text" placeholder="Type *" required data-validation-required-message="Please select Type.">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="General Matters">General Matters</option>
                                        <option value="Corporate Secretary">Corporate Secretary</option>
                                        <option value="Construction Arbitration - Melekon">Construction Arbitration - Melekon</option>
                                    </select>
                                </div>
                            </div>
                            <div style="margin: 5px">
                                <div class="form-group">
                                    <input type="month" name="date" class="form-control" id="date" placeholder="Date *" required data-validation-required-message="Please select Date." />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="height: 10%; background-color:grey; margin:5px;">Filter</button>
                        </div>
                    </form>
                        <a href="/tasks" class="btn btn-primary" style="position: relative; left: 82%;color: #fff">{{ __('Add Task') }}</a>
                    {{-- <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @foreach ($tasks as $i => $task)
                                <div>
                                    <p style="color: #212529;">{{ $i++ }}-{{ $task->tasksCase }}-{{ $task->tasksClient }}-{{ $task->tasksType }}{{ $task->tasksDate }}</p>
                                </div>
                            @endforeach
                            {{ __('You are logged in!') }}
                        </div>
                    </div> --}}
                    <table style="color: #fff;">
                        <th>
                            <tr>
                                <th style="width:20%"> Case</th>
                                <th style="width:25%"> Type</th>
                                <th style="width:20%"> Date</th>
                                <th> Action</th>
                            </tr>
                        </th>
                        <tbody>
                             @foreach($tasks as $task)
                              <tr>
                                  <td> {{$task->tasksCase}} </td>
                                  <td> {{$task->tasksType}} </td>
                                  <td> {{$task->tasksDate}} </td>
                                  <td> 
                                    <a class="btn btn-primary" data-toggle="modal" href="#tasksViewModal" style="background-color: green; margin:5px">{{ __('View') }}</a>  
                                    <a class="btn btn-primary" href="/tasks" style="margin:5px">{{ __('Edit') }}</a>  
                                    <a class="btn btn-primary" href="/tasks" style="background-color: red; margin:5px">{{ __('Delete') }}</a>  
                                  </td>
                              </tr>
                             @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="tasksView-modal modal fade" id="tasksViewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div> -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h3 class="section-heading">Task View</h3>
                            <h5 class="text-muted"></h4><br>
                            <div class="col-lg-10 mx-auto pharagraph-content-justify">
                                <label style="color: #212529">Case:</label>
                                <p></p>
                                <label style="color: #212529">Client:</label><br>
                                <label style="color: #212529">Type:</label><br>
                                <label style="color: #212529">Date:</label><br>
                                <label style="color: #212529">Hours</label><br>
                                <label style="color: #212529">Task Done:</label><br>
                            </div>
                            <!-- <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/06-full.jpg" alt="" /> -->
                            <p></p>
                            <!-- <ul class="list-inline">
                                <li>Date: January 2020</li>
                                <li>Client: Window</li>
                                <li>Category: Photography</li>
                            </ul> -->
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection
