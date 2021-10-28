<div class="main-header">
    <div class="logo">
        <img style="width: 100px; height: 30px;" src="/images/logo.png" alt="">
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="d-flex align-items-center">
        <!-- Mega menu -->
        <div class="dropdown mega-menu d-none d-md-block">
            <a href="#" class="btn text-muted mr-3">Evertec</a>
        </div>
    </div>
    <div style="margin: auto"></div>
    <div class="header-part-right">

    @guest
        <!-- Grid menu Dropdown -->
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
    @else
        <!-- Notificaiton -->
            <div class="dropdown">
                <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-primary">0</span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->
                <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none"
                     aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">

                </div>
            </div>
            <!-- Notificaiton End -->
            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> Timothy Carlson
                        </div>
                        <a class="dropdown-item">Account settings</a>
                        <a class="dropdown-item">Billing history</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endguest
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
    </div>
</div>
