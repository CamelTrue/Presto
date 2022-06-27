<x-layout>

    <div class="container-fluid py-2">
        <div class="row justify-content-center align-items-center">
            <div class="col-12  text-center">
                <h1 class="login-title-header">{{__('ui.work-title')}}</h1>
            </div>
        </div>
    </div>

    <div class="contact-us"></div>
    <div class="container-fluid c-custom-login py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('contactUs.submit')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">{{__('ui.credentials')}}</label>
                      <input name="name" type="text" placeholder="Mario Rossi" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMail" class="form-label">{{__('ui.enter-mail')}}</label>
                        <input name="email" type="mail" placeholder="es:mario@rossi.com" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMessage" class="form-label">{{__('ui.enter-message')}}</label>
                        <textarea name="message" type="text" placeholder="{{__('ui.plh-message')}}" class="form-control" id="exampleInputMessage" cols="30" row="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">{{__('ui.send-mail')}}</button>
                  </form>
            </div>
        </div>
    </div>

</x-layout>