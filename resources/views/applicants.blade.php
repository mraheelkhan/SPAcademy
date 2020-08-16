@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicants'
])

@section('content')
<style>
    .card-stats .card-body .numbers {
        text-align: right;
        font-size: 1.5em;
    }
</style>
<div class="content">
    
    <div class="row card">
      <div class="col-md-12 card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {!! session('error') !!}
        </div>
    @endif
    @if (session('password_status'))
        <div class="alert alert-success" role="alert">
            {{ session('password_status') }}
        </div>
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
         <h2> Register a new course</h2>

         <div class="content">
            <table class="table table-striped" id="applyTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Apply Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1; @endphp
                    @foreach($applicants as $user)
                    <tr>
                        <td>{{$index}}</td>
                        <td>{{ $user->user->firstname . " " . $user->user->lastname }}</td>
                        <td>{{ $user->course->name . " - " . $user->course->grade->name }}</td>
                        <td>{{ $user->created_at->format('d/M/Y') }}</td>
                        <td>
                            <form action="{{route('enrol.applicant')}}" method="POST">
                                @csrf   
                                <input type="hidden" value="{{$user->user->id}}" name="user_id"/>
                                <input type="hidden" value="{{$user->course->id}}" name="course_id"/>
                                <input type="hidden" value="{{$user->id}}" name="applicant_id"/>
                                <button type="submit" class="badge badge-primary badge-pill">Enrol Now</button>
                            </form>
                            |
                            <a href="{{route('applyDestroy', $user->id)}}" class="badge badge-danger">
                                <i class="fas fa-trash"></i> Delete 
                            </a>  
                        </td>
                    </tr>
                    @php $index++; @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
      </div>
    </div>
</div>
@endsection
