@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'offeredcourses'
])

@section('content')
    <div class="content">
            <div class="col-md-6 text-center">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {!! session('success') !!}
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
                <form class="col-md-12" action="{{ route('offeredcourse.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('New Course offer to group') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Select Group') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                    <select name="group_id" class="form-control">
                                        <option value="">Select Group</option>
                                        @foreach($groups as $group)
                                        <option value="{{$group->id}}" {{ old('group_id') == $group->id ? "selected" : "" }}>{{ $group->name }}</option>
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
                                <label class="col-md-3 col-form-label">{{ __('Select Course') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select name="course_id" class="form-control">
                                            <option value="">Select Course</option>
                                            @foreach($courses as $course)
                                            <option value="{{ $course->id}}" {{ old('course_id') == $course->id ? "selected" : "" }}>{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
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

    
    <script>
        
    </script>
@endsection