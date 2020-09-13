@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'classes'
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
                    <div class="card p-2">
                        <div class="header row">
                            <div class="">
                                <h4 class="title">New Class</h4>
                            </div>
                        </div>
                        <div class="content">
                            <form class="" action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">{{ __('Select Course') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <select name="course_id" class="form-control" required>
                                                        <option value="">Select Course</option>
                                                        @foreach($courses as $course)
                                                        <option value="{{$course->id}}" {{ old('course_id') == $course->id ? "selected" : "" }}>{{ $course->name . " - " . $course->grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                    @if ($errors->has('course_id'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('course_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label">{{ __('Class Link') }}</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" name="link" class="form-control" value="{{ old('link')}}" placeholder="Class link" required>
                                                </div>
                                                @if ($errors->has('link'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('link') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">{{ __('Time and Date') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" name="timedate" id="timedate" class="form-control" value="{{ old('timedate')}}" placeholder="Class timedate" required>
                                                    </div>
                                                    @if ($errors->has('timedate'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('timedate') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
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
                <div class="col-md-12">
                    <div class="card p-2">
                        <div class="header row">
                            <div class="">
                                <h4 class="title">Classes List</h4>
                            </div>
                        </div>
                        <div class="content">
                            <table class="table table-striped" id="usersTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Course</th>
                                        <th>Group</th>
                                        <th>Is Done</th>
                                        <th>Link</th>
                                        <th>Date at</th>
                                        <th>Time at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 1; /* for Serial Number Purpose */ @endphp 
                                    @foreach($periods as $class)
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{ $class->course->name }}</td>
                                        <td>{{ $class->grade->name }}</td>
                                        <td>{{ $class->is_done == 0 ? "Up Coming" : "Done" }}</td>
                                        <td> <a target="_blank" href="{{ $class->link }}">{{ $class->link }}</a></td>
                                        <td>{{ date("d-m-Y", strtotime($class->period_at))}}</td>
                                        <td>{{ date("h:i:s a", strtotime($class->period_at))}}</td>
                                        {{-- <td>{{ $class->period_at->format('d/M/Y') }}</td> --}}
                                        <td>
                                            <a href="{{route('class.destroy', $class->id)}}" class="badge badge-danger">
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
        </div>
    </div>

    <script>
        $(function() {
          $('#timedate').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            showDropdowns: true,
            minYear: 2020,
            maxYear: parseInt(moment().format('YYYY'),10),
            startDate: moment().startOf('hour'),
            // endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'DD-MM-YYYY H:mm:ss'
            }
          });
        });
        </script>
@endsection