<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        {{-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('Creative Tim') }}
        </a> --}}
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
            <li class="{{ $elementActive == 'register-course' ? 'active' : '' }}">
                <a href="{{ route('applyCourse') }}">
                    <i class="nc-icon nc-bank"></i>
                <p>{{ __('Register Course') }}  
                </a>
            </li>
            @endcannot
            {{-- <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            @can('passAdmin')
            @php 
            $newApplicants = App\Model\ApplyCourse::where('is_new', true)->count();
            @endphp
            <li class="{{ $elementActive == 'applicants' ? 'active' : '' }}">
                <a href="{{ route('applyList') }}">
                    <i class="nc-icon nc-bank"></i>
                <p>{{ __('Applicant List') }}  
                    @if($newApplicants > 0)
                    <span class="badge badge-success">{{ $newApplicants }}</span></p>
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
            {{-- <li class="{{ $elementActive == 'offeredcourses' ? 'active' : '' }}">
                <a href="{{ route('offeredcourse.index') }}">
                    <i class="fas fa-check-circle"></i>
                    <p>{{ __('Offered Courses') }}</p>
                </a>
            </li> --}}
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