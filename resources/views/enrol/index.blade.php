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
                                <h4 class="title">Group List</h4>
                            </div>
                        </div>
                        <div class="content">
                            <div class="row p-1">
                                @foreach($groups as $group)
                                <div class="col-md-4">
                                    <div class="card card2 text-center">
                                        {{-- <div class="card-header">
                                        {{ $group->name }}
                                        </div> --}}
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $group->name }}</h5>
                                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                                            <a href="{{ route('group.details', $group->id) }}" class="btn btn-primary">group details</a>
                                        </div>
                                        <div class="card-footer text-muted">
                                            {{ $group->created_at->format('d-M- y')}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                           
                        </div>
                    </>
                </div>


            </div>
        </div>
    </div>
@endsection