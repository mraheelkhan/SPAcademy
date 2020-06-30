@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'offeredcourses'
])

@section('content')
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
                                <h4 class="title">Offered Courses List</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('offeredcourse.new')}}" class="btn btn-primary btn-round">
                                <i class="fas fa-plus"></i>   Offer New Course
                               </a>
                            </div>
                        </div>
                        <div class="content">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Group</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 1; @endphp
                                    @foreach($offeredcourses as $oc)
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{ $oc->group->name }}</td>
                                        <td>{{ $oc->course->name }}</td>
                                        <td>
                                            <a href="{{route('offeredcourse.destroy', $oc->id)}}" class="badge badge-danger">
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
@endsection