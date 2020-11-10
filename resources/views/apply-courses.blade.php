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
   
</div>
@endsection
