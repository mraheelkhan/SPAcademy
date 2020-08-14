@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'enrolstudents'
])

@section('content')
<style>
    .card2{
        border: 1px solid #ef8157;
    }
</style>
    <div class="content">
        @if(Session::has('success'))
            <p class="alert alert-success">{!! Session::get('success') !!}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert alert-danger">{!! Session::get('error') !!}</p>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header row">
                            <div class="col-md-6">
                                <h4 class="title">{{$course->name . " - " . $course->grade->name }}  List</h4>
                            </div>
                        </div>
                        <div class="content">
                            <div class="row p-1">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        @foreach($users as $user)
                                        @if(!in_array($user->id, $listcheck))
                                       
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <form action="{{route('group.enrol',$course->id)}}" method="POST">
                                                @csrf
                                                <label>
                                                    {{ $user->firstname . " " . $user->lastname . " - " . $user->email }}
                                                </label>
                                                <input type="hidden" value="{{$user->id}}" name="enrol_id"/>
                                                <input type="hidden" value="{{$course->id}}" name="course_id"/>
                                                <button type="submit" class="badge badge-primary badge-pill">Enrol Now</button>
                                            </form>
                                         
                                          {{-- <span class="badge badge-primary badge-pill">Enrol Now</span> --}}
                                        </li>
                                        @endif
                                        @endforeach
                                      </ul>
                                </div>
                            </div>
                            
                            <div class="row p-1">
                                <div class="col-md-6 m-5">
                                    <h2> Already Enrolled Students </h2>    
                                    @foreach($course->enrollment as $student)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                          
                                          <form action="{{route('group.enroldelete',$course->id)}}" method="POST">
                                            @csrf
                                            <label>
                                                {{ $student->user ->firstname . " " . $student->user   ->lastname . " - " . $student->user    ->email }}
                                            </label>
                                            <input type="hidden" value="{{$student->id}}" name="enrol_id"/>
                                            <input type="hidden" value="{{$course->id}}" name="group_id"/>
                                            <button type="submit" class="badge badge-danger badge-pill">Delete</button>
                                        </form>
                                          {{-- <span class="badge badge-danger badge-pill">Delete Now</span> --}}
                                        </li>
                                    @endforeach
                                </div>
                                
                            </div>
                           
                        </div>
                    </>
                </div>


            </div>
        </div>
    </div>
@endsection