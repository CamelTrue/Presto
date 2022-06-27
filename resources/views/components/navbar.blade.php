<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            {{-- <img class="logo-presto"  src="../img/PRESTO-logos_black.png" alt="logo"> --}}
            <h2 class="logo-presto">PRESTO</h2>
        </a>
        <button class="navbar-toggler bg-blue" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-grip-lines"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('announce.create')}}">{{__('ui.create')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('announce.index')}}">{{__('ui.announce')}}</a>
                </li>

                <li class="nav-item">
                    <x-locale lang="it" nation="it"/>
                </li>

                <li class="nav-item">
                    <x-locale lang="en" nation="gb"/>
                </li>

                <li class="nav-item">
                    <x-locale lang="es" nation="es"/>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contactUs')}}">{{__('ui.work')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.welcomeU')}} {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="navbarDropdown">
                            {{-- <li><a class="dropdown-item" href="#">Profilo</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">{{__('ui.logout')}}</a></li>
                            <li><hr class="dropdown-divider revisor"></li>
                            @if(Auth::user()->is_revisor)
                                <li class="nav-item">
                                    <a class="nav-link-revisor" href="{{route('revisor.home')}}">{{__('ui.revision')}}
                                        <span class="badge badge-pill badge-warning ">
                                            {{\App\Models\Announce::ToBeRevisionedCount()}}
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <form action="{{route('logout')}}" method="post" class="d-none" id="form-logout">@csrf</form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.guest')}}
                        </a>
                        <ul class="dropdown-menu dropdown-custom" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.register')}}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.login')}}</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>