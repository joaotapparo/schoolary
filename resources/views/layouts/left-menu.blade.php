<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start min-vh-100">
        <ul class="nav flex-column pt-2 w-100">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home')? 'active' : '' }}" href="{{url('home')}}"><i
                        class="ms-auto bi bi-grid"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">{{ __('Central') }}</span></a>
            </li>
            {{-- @if (Auth::user()->role == "teacher")
                    <li class="nav-item">
                        <a type="button" href="{{url('attendances')}}" class="d-flex nav-link
            {{ request()->is('attendances*')? 'active' : '' }}"><i class="bi bi-calendar2-week"></i> <span
                class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
            </li>
            @endif --}}
            @can('view classes')
            <li class="nav-item">
                @php
                if (session()->has('browse_session_id')){
                $classCount = \App\Models\SchoolClass::where('session_id', session('browse_session_id'))->count();
                } else {
                $latest_session = \App\Models\SchoolSession::latest()->first();
                if($latest_session) {
                $classCount = \App\Models\SchoolClass::where('session_id', $latest_session->id)->count();
                } else {
                $classCount = 0;
                }
                }
                @endphp
                <a class="nav-link d-flex {{ request()->is('classes')? 'active' : '' }}" href="{{url('classes')}}"><i
                        class="bi bi-diagram-3"></i> <span
                        class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Materias</span> <span
                        class="ms-auto d-inline d-sm-none d-md-none d-xl-inline">{{ $classCount }}</span></a>
            </li>
            @endcan
            @if(Auth::user()->role != "aluno")
            <li class="nav-item">
                <a type="button" href="#aluno-submenu" data-bs-toggle="collapse"
                    class="d-flex nav-link {{ request()->is('alunos*')? 'active' : '' }}"><i
                        class="bi bi-person-lines-fill"></i> <span
                        class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Alunos</span>
                    <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                </a>
                <ul class="nav collapse {{ request()->is('alunos*')? 'show' : 'hide' }} bg-white"
                    id="aluno-submenu">
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('aluno.list.show')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('aluno.list.show')}}"><i
                                class="bi bi-person-video2 me-2"></i>Vizualizar Alunos</a></li>
                    @if (!session()->has('browse_session_id') && Auth::user()->role == "secretaria")
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('aluno.create.show')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('aluno.create.show')}}"><i
                                class="bi bi-person-plus me-2"></i>Adicionar Aluno</a></li>
                    @endif
                </ul>
            </li>
            <li class="nav-item">
                <a type="button" href="#teacher-submenu" data-bs-toggle="collapse"
                    class="d-flex nav-link {{ request()->is('teachers*')? 'active' : '' }}"><i
                        class="bi bi-person-lines-fill"></i> <span
                        class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Professores</span>
                    <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                </a>
                <ul class="nav collapse {{ request()->is('teachers*')? 'show' : 'hide' }} bg-white"
                    id="teacher-submenu">
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('teacher.list.show')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('teacher.list.show')}}"><i
                                class="bi bi-person-video2 me-2"></i>Vizualizar Professores</a></li>
                    @if (!session()->has('browse_session_id') && Auth::user()->role == "secretaria")
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('teacher.create.show')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('teacher.create.show')}}"><i
                                class="bi bi-person-plus me-2"></i>Adicionar Professores</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == "teacher")
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('courses/teacher*') || request()->is('courses/assignments*'))? 'active' : '' }}"
                    href="{{route('course.teacher.list.show', ['teacher_id' => Auth::user()->id])}}"><i
                        class="bi bi-journal-medical"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">My Courses</span></a>
            </li>
            @endif
            @if(Auth::user()->role == "aluno")
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('aluno.attendance.show')? 'active' : '' }}"
                    href="{{route('aluno.attendance.show', ['id' => Auth::user()->id])}}"><i
                        class="bi bi-calendar2-week"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('course.aluno.list.show')? 'active' : '' }}"
                    href="{{route('course.aluno.list.show', ['aluno_id' => Auth::user()->id])}}"><i
                        class="bi bi-journal-medical"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Courses</span></a>
            </li>
            {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-file-post"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Assignments</span></a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-cloud-sun"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Marks</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-journal-text"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Monitoria</span></a>
                    </li> --}}
            <li class="nav-item border-bottom">
                @php
                if (session()->has('browse_session_id')){
                $class_info = \App\Models\Promotion::where('session_id',
                session('browse_session_id'))->where('aluno_id', Auth::user()->id)->first();
                } else {
                $latest_session = \App\Models\SchoolSession::latest()->first();
                if($latest_session) {
                $class_info = \App\Models\Promotion::where('session_id', $latest_session->id)->where('aluno_id',
                Auth::user()->id)->first();
                } else {
                $class_info = [];
                }
                }
                @endphp
                <a class="nav-link" href="{{route('section.cronograma.show', [
                            'class_id'  => $class_info->class_id,
                            'section_id'=> $class_info->section_id
                        ])}}"><i class="bi bi-calendar4-range"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Cronograma</span></a>
            </li>
            @endif
            @if(Auth::user()->role != "aluno")
            <li class="nav-item border-bottom">
                <a type="button" href="#exam-grade-submenu" data-bs-toggle="collapse"
                    class="d-flex nav-link {{ request()->is('exams*')? 'active' : '' }}"><i class="bi bi-file-text"></i>
                    <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Exams / Grades</span>
                    <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                </a>
                <ul class="nav collapse {{ request()->is('exams*')? 'show' : 'hide' }} bg-white"
                    id="exam-grade-submenu">
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('exam.list.show')? 'font-weight:bold;' : '' }}"><a class="nav-link"
                            href="{{route('exam.list.show')}}"><i class="bi bi-file-text me-2"></i> View Exams</a></li>
                    @if (Auth::user()->role == "secretaria" || Auth::user()->role == "teacher")
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('exam.create.show')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('exam.create.show')}}"><i class="bi bi-file-plus me-2"></i>
                            Create Exams</a></li>
                    @endif
                    @if (Auth::user()->role == "secretaria")
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('exam.grade.system.create')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('exam.grade.system.create')}}"><i
                                class="bi bi-file-plus me-2"></i> Add Grade Systems</a></li>
                    @endif
                    <li class="nav-item w-100"
                        style="{{ request()->routeIs('exam.grade.system.index')? 'font-weight:bold;' : '' }}"><a
                            class="nav-link" href="{{route('exam.grade.system.index')}}"><i
                                class="bi bi-file-ruled me-2"></i> View Grade Systems</a></li>
                </ul>
            </li>
            {{-- <li class="nav-item border-bottom">
                        <a type="button" href="#" class="d-flex nav-link {{ request()->is('marks*')? 'active' : '' }}
            dropdown-toggle caret-off" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-cloud-sun"></i>
            <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Marks / Results</span>
            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{url('marks/view')}}">View Marks</a></li>
                <li><a class="dropdown-item" href="{{url('marks/results')}}">View Results</a></li>
            </ul>
            </li> --}}
            @endif
            
            @if (Auth::user()->role == "secretaria")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('notice*')? 'active' : '' }}" href="{{route('notice.create')}}"><i
                        class="bi bi-megaphone"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Avisos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('calendar-event*')? 'active' : '' }}"
                    href="{{route('events.show')}}"><i class="bi bi-calendar-event"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline"> Calendario acadêmico</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('monitoria*')? 'active' : '' }}"
                    href="{{route('class.monitoria.create')}}"><i class="bi bi-journal-text"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Monitoria</span></a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link {{ request()->is('cronograma*')? 'active' : '' }}"
                    href="{{route('section.cronograma.create')}}"><i class="bi bi-calendar4-range"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Cronograma</span></a>
            </li>
            @endif

            @if (Auth::user()->role == "secretaria")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('academics*')? 'active' : '' }}"
                    href="{{url('academics/settings')}}"><i class="bi bi-tools"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Academico</span></a>
            </li>
            @endif

            @if (!session()->has('browse_session_id') && Auth::user()->role == "secretaria")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('promotions*')? 'active' : '' }}"
                    href="{{url('promotions/index')}}"><i class="bi bi-sort-numeric-up-alt"></i> <span
                        class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Promotion</span></a>
            </li>
            @endif
        </ul>
    </div>
</div>