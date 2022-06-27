<x-layout>

    @if (session('flash'))
        <div class="alert alert-success">
            {{session('flash')}}
        </div>
    @endif

    <div class="img-announce-index">

        
    </div>

    @if(count($announces) == 0)
        <h1>{{__('ui.noannounces')}}</h1>
    @else
        <div class="container-fluid my-5">
            <div class="row justify-content-center align-items-center">
                    @foreach ($announces as $announce)
                    <div class="col-12 col-md-6 col-lg-3 m-auto">
                        <div class="card my-3 custom-card">
                            <h5>{{$announce->title}}</h5>
                            @foreach ($announce->images as $image)
                                    <img id="img-announces" src="{{$image->getUrl(400, 200)}}" alt="">
                            @endforeach
                            <div class="card-body">
                                <p>
                                    {{$announce->description}}
                                </p>
                            </div>
                            <div class="justify-content-center align-items-center">
                                <i class="d-block p-1 custom-abs-1"><span class="fst-italic">{{__('ui.createat')}}</span><b>{{$announce->created_at->format('d/m/Y')}}</b></i>
                                <i class="d-block p-1 custom-abs-2"><span class="fst-italic">{{__('ui.createfrom')}}</span><b>{{$announce->user->name}}</b></i>
                                <i class="d-block p-1 custom-abs-2"><span class="fst-italic">{{__('ui.category')}}</span><b>{{$announce->category->name}}</b></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
            </div>
        </div>
    @endif


    
</x-layout>