<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2 class="register-title-header">{{__('ui.registersection')}}</h2>
            </div>
        </div>
    </div>

    <div class="img-header-register"></div>

    <div class="container-fluid c-custom-register">
        <div class="row justify-content-center align-items-center form-media">
            <div class="col-12 col-md-8">
                <form action="{{route('register')}}" method="post" data-aos="fade-left">

                    @csrf

                    <div class="mb-3">
                        <label for="inputUsername" class="form-label text-blue">Username:</label>
                        <input name="name" type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label text-blue">Email:</label>
                        <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label text-blue">Password:</label>
                        <input name="password" type="password" class="form-control" id="inputPassword" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputPasswordConfirmation" class="form-label text-blue">{{__('ui.confirmP')}}</label>
                        <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirmation" aria-describedby="emailHelp">
                    </div>
                    <div class="p-0 fst-italic form-label text-blue ">
                        <p>{{__('ui.alreadyReg')}}<a class="decorate-b form-label" href="{{route('login')}}">{{__('ui.clickhere')}}</a></p>
                    </div>

                    <div class="cta-custom">
                        <button type="submit" class="cta">
                            <span class="hover-underline-animation">{{__('ui.register2')}}</span>
                            <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                                <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
                            </svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="separator-login"></div>

</x-layout>