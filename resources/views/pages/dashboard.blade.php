@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
<style>
    .card-stats .card-body .numbers {
        text-align: right;
        font-size: 1.5em;
    }
</style>
<div class="content">
    @cannot('passAdmin')
    {{-- it won't show to admins --}}
    <div class="row">
        <div class="col-md-12">
            Get register yourself in courses.
            <a href="{{route('applyCourse')}}" class="btn btn-primary">Register new course</a>
        </div>
        <div class="col-md-12">
            <h2> Upcoming Classes</h2>
            <p> If you don't see any class, please wait for your classes. we show you up coming today classes only.</p>
        </div>
    </div>
    {{-- <div class="row card">
        <div class="col-md-12 card-body">
            <div class="form">
                <form class="form-horizontal" method="POST" action="{{ route('applyBulk') }}">
                    @csrf
                    @foreach($courses as $course)
                    <div class="form-group">
                        <label for="courses" class="label">
                            {{ $course->name }}
                            <input type="checkbox" name="courses[]" value="{{$course->id}}" class="form-control"/>
                        </label>
                    </div>
                    @endforeach
                    <input type="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div> --}}
    @endcannot
    @can('passAdmin')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">New Applicants</p>
                                <p class="card-title">{{ $newApplicants }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="{{ route('applyList') }}">
                            <i class="fa fa-refresh"></i> Check  Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Registered Students</p>
                                <p class="card-title">{{ $registeredStudents }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="{{ route('applyList') }}">
                            <i class="fa fa-refresh"></i> Check  Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <div class="row">
        @foreach($classes as $class)
        @if($class->isShow)
        {{-- to whether show class or not --}}
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-success">
                                <i class="fas fa-chalkboard-teacher text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">
                                    {{ date("d-m-Y H:m:s a", strtotime($class->period_at))}}
                                </p>
                                <p class="card-title">
                                    {{ $class->course->name }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <a href="{{ $class->link }}" target="_blank">
                            <i class="fa fa-refresh"></i> Join Now  
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif 
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}
@endpush