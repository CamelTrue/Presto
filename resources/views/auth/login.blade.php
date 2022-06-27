<x-layout>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <h2 class="login-title-header">{{__('ui.loginsection')}}</h2>
            <div class="col-12 col-md-6">
            </div>
        </div>
    </div>

    <div class="img-header-login"></div>

    <div class="container-fluid c-custom-login">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form action="{{route('login')}}" method="post" data-aos="fade-left" class="form-custom ">

                    @csrf

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label text-blue">Email:</label>
                        <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="mario.rossi@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label text-blue">Password:</label>
                        <input name="password" type="password" class="form-control" id="inputPassword" aria-describedby="emailHelp" placeholder="Es:MarioRossi9596">
                    </div>
                    <div class="p-0 fst-italic">
                        <p class="text-blue">{{__('ui.noregister')}}<a class="decorate-b" href="{{route('register')}}">{{__('ui.click')}}</a></p>
                    </div>

                    <div class="cta-custom ">
                        <button type="submit" class="cta">
                            <span class="hover-underline-animation text-blue">Login</span>
                            <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                                <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
                            </svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


</x-layout>