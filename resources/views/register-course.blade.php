@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'register-course'
])

@section('content')
<style>
    .card-stats .card-body .numbers {
        text-align: right;
        font-size: 1.5em;
    }
</style>
<div class="content">
    <div class=" card">
        <div class="col-md-12 card-body">
            <h2> Select and apply for multiple courses</h2>
            <div class="form ">
                <form class="form-horizontal" method="POST" action="{{ route('applyBulk') }}">
                    @csrf
                    <table class="">
                        <tr class="thead table">
                            <td>

                                Course Name
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>

                    
                    @foreach($courses as $course)
                   <tr>
                       <td>
                        <p>{{ $course->name }}</p>
                       </td>
                       <td>
                        <input id="courses[]" type="checkbox" name="courses[]" value="{{$course->id}}" class="form-control"/>
                       </td>
                   </tr>
                       
                    
                    @endforeach
                </table>
                    <input type="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
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

         <form class="col-md-12" action="{{ route('applyStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="card-header">
                    <h5 class="title">{{ __('New Course') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-3 col-form-label">{{ __('Select Course') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                            <select name="course_id" class="form-control" required>
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" {{ old('course_id') == $course->id ? "selected" : "" }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">{{ __('Select Grade') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                            <input type="text" name="grade_id" class="form-control" value="{{ auth()->user()->grade->name }}" placeholder="Grade Name" required readonly>
                            </div>
                            @if ($errors->has('grade_id'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('grade_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">{{ __('Any comment') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea class="form-control" name="description"> {{ old('description')}}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    
                </div>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
   
</div>
@endsection
