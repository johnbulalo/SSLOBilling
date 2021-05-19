@extends('layouts.app')

@section('content')
<div>
    @if (Route::has('login'))
        {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div> --}}
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">            
            <section class="page-section" id="task">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase" style="padding-top:3%">Tasks</h2>
                        <div class="notification">
                            <p class="mssg">{{ session('mssg') }}</p>
                        </div>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>
                    <form id="taskForm" action="/tasks" method="POST" name="storeTask" >
                        @csrf 
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group" id="case">
                                    <select class="form-control" name="case" id="case" type="text" placeholder="Case *" required data-validation-required-message="Please select Case.">
                                        <option value="" disabled selected required>Select Case</option>
                                        @foreach ($cases as $case)
                                        <option value="{{ $case->casesName }}">{{ $case->casesNumber }}-{{ $case->casesName }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="client" value="{{ $case->casesClient }}" readonly='true' id="client" type="text" placeholder="Client *" required data-validation-required-message="Please enter Client." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="type" id="type" type="text" placeholder="Type *" required data-validation-required-message="Please select Type.">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="General Matters">General Matters</option>
                                        <option value="Corporate Secretary">Corporate Secretary</option>
                                        <option value="Construction Arbitration - Melekon">Construction Arbitration - Melekon</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    {{-- <input class="form-control" name="lawyer" id="lawyer" type="text" value="{{ Auth::user()->name }}" placeholder="Lawyer *" required data-validation-required-message="Please enter Lawyer Name." />
                                    <p class="help-block text-danger"></p> --}}
                                    <select class="form-control" name="lawyer" id="lawyer" type="text" placeholder="Lawyer *" required data-validation-required-message="Please select Type.">
                                        <option value="{{ Auth::user()->name }}">{{ Auth::user()->name }}</option>
                                        <option value="Manuel C. Carlos">Manuel C. Carlos</option>
                                        <option value="Larry L. Tanlu">Larry L. Tanlu</option>
                                        <option value="Daniel C. Vega">Daniel C. Vega</option>
                                        <option value="Jose Z. Aliling">Jose Z. Aliling</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="row align-items-stretch mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="date" class="form-control" id="date" placeholder="Date *" required data-validation-required-message="Please select Date." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-md-0">
                                            <input class="form-control" name="hours" id="hours" type="number" placeholder="Hours *" step="any" required data-validation-required-message="Please enter Hours." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <dl>
                                    <dt>Template</dt>
                                        <li>Attend on [date] the [Hearing/Conference] at [place].</li>
                                        <li>Prepare and file on [date] the [document].</li>
                                        <li>Prepare and send on [date] through Electronic Mail to [name],  the Letter re.: [subject matter].</li>
                                        <li>Conduct on [date] a Conference at the office re.: [subject matter].</li>
                                        <li>Conduct on [date] a Telephone Conference with [name].</li>
                                        <li>Assist on ___ in ___.</li>
                                </dl>
                                <div class="form-group form-group-textarea mb-md-0">
                                    <textarea class="form-control" name="task" id="task" placeholder="Task *" required="required" data-validation-required-message="Please enter a Task."></textarea>
                                
                                </div>
                                <div class="text-right" style="padding-top:10%">
                                    <div class="row align-items-stretch mb-5" style="padding-left: 40%">
                                        {{-- <div class="col-md-6" style="text-align:right; float: right;">
                                            <div id="success"></div>
                                            <a class="btn-lg text-uppercase" style="padding-left:20%; float: right;" href="">Add Task</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="success"></div>
                                            <button class="btn btn-primary btn-lg text-uppercase" id="uploadTaskButton" type="submit">Upload Task</button>
                                        </div> --}}
                                        <div id="success"></div>
                                        <a class="btn-lg text-uppercase" style="padding-left:20%; float: right;" href="{{ url('multipleStore') }}">Add Task</a>
                                        <div id="success"></div>
                                        <button class="btn btn-primary btn-lg text-uppercase" id="uploadTaskButton" type="submit">Upload Task</button>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

