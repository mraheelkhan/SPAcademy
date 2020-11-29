<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            @cannot('passAdmin')
            @if(auth()->user()->role != 'instructor')
            <li class="{{ $elementActive == 'register-course' ? 'active' : '' }}">
                <a href="{{ route('applyCourse') }}">
                    <i class="nc-icon nc-bank"></i>
                <p>{{ __('Register Course') }}  
                </a>
            </li>
            @endif
            @endcannot
            @can('passAdmin')
            @php 
            $newApplicants = App\Model\ApplyCourse::where('is_new', true)->count();
            @endphp
            <li class="{{ $newApplicants > 0 ? 'bg-success' : '' }} {{ $elementActive == 'applicants' ? 'active' : '' }}">
                <a href="{{ route('applyList') }}">
                    <i class="nc-icon nc-bank"></i>
                <p>{{ __('Applicant List') }}  
                    @if($newApplicants > 0)
                    <span class="badge badge-info   ">{{ $newApplicants }}</span></p>
                    @endif
                </a>
            </li>
            <li class="{{ $elementActive == 'courses' ? 'active' : '' }}">
                <a href="{{ route('course.index') }}">
                    <i class="fas fa-book"></i>
                    <p>{{ __('Courses') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'groups' ? 'active' : '' }}">
                <a href="{{ route('group.index') }}">
                    <i class="fas fa-users"></i>
                    <p>{{ __('Grades') }}</p>
                </a>
            </li>
            
            <li class="{{ $elementActive == 'enrolstudents' ? 'active' : '' }}">
                <a href="{{ route('enrolstudent.index') }}">
                    <i class="fas fa-user-plus"></i>
                    <p>{{ __('Enroll Students') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'classes' ? 'active' : '' }}">
                <a href="{{ route('class.index') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <p>{{ __('Classes') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}">
                    <i class="fas fa-user-cog"></i>
                    <p>{{ __('Portal Users') }}</p>
                </a>
            </li>
            @endcan
          
        </ul>
    </div>
</div>