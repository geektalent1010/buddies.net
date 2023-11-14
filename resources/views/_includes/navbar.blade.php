<div class="headerSection fixed-header">
    <nav class="navbar">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbarItem d-flex align-items-center justify-content-start">
                @if (isset($ACTIVE_TITLE) && $ACTIVE_TITLE != 'buddies')
                <a class="navbar-brand pl-1" href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid" alt="Buddies.zone" title="Buddies.zone" />
                </a>
                @else
                <a class="navbar-brand pl-1" href="{{ route('landing') }}">
                    <img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid" alt="Buddies.zone" title="Buddies.zone" />
                </a>
                @endif
            </div>
            <div class="navbarItem text-center">
                @if (isset($ACTIVE_TITLE))
                    <span class="navbar-title">
                        {{ $ACTIVE_TITLE }}
                    </span>
                @else
                    <img src="{{ asset('images/logo/Buddies.svg') }}" class="img-fluid buddies-svg" alt="landing buddies svg" />
                @endif
            </div>
            <div class="navbarItem d-flex align-items-center justify-content-end" style="gap: 12px">
            @guest
                {{-- @if ('register' != Route::current()->getName()) --}}
                    <a href="{{ route('login') }}" class="py-3 pr-1">
                        <div class="login-out-icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 22 16" style="enable-background:new 0 0 22 16;" xml:space="preserve" width="22px" height="22px">
                            <g>
                                <g>
                                    <g>
                                        <path class="st0" d="M19.3,0.4L19.3,0.4c1,0,1.8,0.8,1.8,1.8v11.6c0,1-0.8,1.8-1.8,1.8l0,0c-1,0-1.8-0.8-1.8-1.8V2.2
                                            C17.4,1.2,18.3,0.4,19.3,0.4z"/>
                                    </g>
                                </g>
                                <path class="st1" d="M13.6,6.9L2.8,0.6C2,0.2,0.9,0.8,0.9,1.8v12.5c0,1,1.1,1.6,1.9,1.1l10.8-6.2C14.5,8.6,14.5,7.4,13.6,6.9z"/>
                            </g>
                            </svg>
                        </div>
                    </a>
                {{-- @endif --}}
            @else
                <a href="{{ route('logout') }}" class="py-3 pr-1"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="login-out-icon">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 22 16" style="enable-background:new 0 0 22 16;" xml:space="preserve" width="22px" height="22px">
                        <g>
                            <g>
                                <g>
                                    <path class="st0" d="M4.5,2.2v11.6c0,1-0.8,1.8-1.8,1.8l0,0c-1,0-1.8-0.8-1.8-1.8V2.2c0-1,0.8-1.8,1.8-1.8l0,0
                                        C3.7,0.4,4.6,1.2,4.5,2.2z"/>
                                </g>
                            </g>
                            <path class="st1" d="M20.5,6.9L9.7,0.6C8.8,0.2,7.7,0.8,7.7,1.8v12.5c0,1,1.1,1.6,1.9,1.1l10.8-6.2C21.3,8.6,21.3,7.4,20.5,6.9z"/>
                        </g>
                        </svg>
                    </div>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
            </div>
        </div>
    </nav>
</div>
