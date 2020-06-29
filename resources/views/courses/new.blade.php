@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'courses'
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
                <form class="col-md-12" action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('New Course') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Course Name') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="Course Name" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Course Code') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="code" class="form-control" value="{{ old('code')}}" placeholder="Course Code" required>
                                    </div>
                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Course Fee') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="number" name="fee" maxlength="5" class="form-control" value="{{ old('fee')}}" placeholder="Course Fee" required>
                                    </div>
                                    @if ($errors->has('fee'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('fee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Course Description') }}</label>
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

    
    <script>
        
    </script>
@endsection