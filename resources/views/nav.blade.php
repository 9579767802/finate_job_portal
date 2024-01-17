<header class="header-area transparent" style="background-color: green;">
    <div class="container">
        <div class="row no-gutter align-items-center position-relative">
            <div class="col-12">
                <div class="header-align">
                    <div class="header-align-start">
                        <div class="header-logo-area">
                            <a href="#">
                                <img class="logo-main" src="assets/img/logo-light.png" alt="Logo" />
                            </a>
                        </div>
                    </div>
                    <div class="header-align-center">
                        <div class="header-navigation-area position-relative">

                            <ul class="main-menu nav ms-auto">
                                @if (Auth::user() && Auth::user()->role == 'employers')
                                    <li><a href="{{ route('home') }}"><span>Home</span></a></li>
                                    <li class="has-submenu"><a href="#/"><span>Jobs</span></a>
                                        <ul class="submenu-nav">
                                            <li><a href="{{ route('jobs.index') }}"><span> Add Jobs</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu"><a href="#/"><span>Candidates</span></a>
                                        <ul class="submenu-nav">
                                            <li><a href="{{ route('candidate.applied-candidates') }}"><span>Job Applied
                                                        Candidates</span></a>
                                            <li><a href="{{ route('candidate.index') }}"><span>Candidates</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#/"><span>{{ auth()->user()->first_name }}</span></a>
                                        <ul class="submenu-nav">
                                            <li>
                                                <a
                                                    href="{{ route('profile', auth()->user()->id) }}"><span>Profile</span></a>
                                            </li>

                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if (Auth::user() && Auth::user()->role == 'candidate')
                                    <li><a href="{{ route('home') }}"><span>Home</span></a></li>
                                    <li class="has-submenu"><a href="#/"><span>Find Jobs</span></a>
                                        <ul class="submenu-nav">
                                            <li><a href="{{ route('jobs.show') }}"><span>Jobs</span></a></li>
                                            {{-- <li><a href="job-details.html"><span>Job Details</span></a></li> --}}
                                        </ul>
                                    </li>
                                    {{-- <li><a href="{{ route('employers.index') }}"><span>Employers Details</span></a> --}}
                                    </li>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#/"><span>{{ auth()->user()->first_name }}</span></a>
                                        <ul class="submenu-nav">
                                            <li>
                                                <a
                                                    href="{{ route('candidate.edit', auth()->user()->id) }}"><span>Profile</span></a>
                                            </li>

                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if (Auth::user() && Auth::user()->role == 'admin')
                                    <li class="has-submenu">
                                        <a href="{{ route('job-categories.index') }}"><span>Job Categories</span></a>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="{{ route('admin.details') }}"><span>Employers Listings</span></a>
                                    </li>


                                    <li><a href="{{ route('admin.candidatelist') }}"><span>Candidates Listing
                                            </span></a></li>
                                    <li class="has-submenu">
                                        <a href="#/"><span>{{ auth()->user()->first_name }}</span></a>
                                        <ul class="submenu-nav">
                                            <li>
                                                <a
                                                    href="{{ route('admin.profile', auth()->user()->id) }}"><span>Profile</span></a>
                                            </li>

                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @guest
                                    @if (Route::has('login'))
                                    @endif
                                @endguest
                            </ul>
                        </div>
                    </div>

                    <div class="header-align-end">
                        @guest
                            <div class="header-action-area">
                                <a class="btn-registration" href="{{ route('register') }}"><span>+</span> Registration</a>
                                <a class="btn-registration" href="{{ route('login') }}"><span>+</span> Login</a>
                                <button class="btn-menu" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                    <i class="icofont-navigation-menu"></i>
                                </button>
                            </div>
                        @endguest
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
