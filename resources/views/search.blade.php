<x-layout>

    <div class="container-fluid my-5" data-aos="fade-left">
        <div class="row justify-content-center align-items-center">
            @foreach($announces as $announce)
                <div class="col-12 col-md-6">
                    <a href="{{route('category.announces',['category'=> $announce->category->id, 'name' => $announce->category->name])}}">
                        <div class="card-c my-5">
                            <div class="card-2-c">
                                <div class="card-header">{{$announce->title}}</div>
                                <div class="card-body">
                                    <img class="img-fluid w-100" src="https://picsum.photos/300/200" alt="">
                                </div>
                                <div class="card-container">
                                    <p>
                                        {{$announce->description}}
                                    </p>
                                </div>
                                <div class="card-footer justify-content-center align-items-center">
                                    <a class="link-announce p-1">{{$announce->category->name}}</a>
                                    <i class="d-block p-1 custom-abs-1"><span class="fst-italic">{{__('ui.createat')}}</span> <b>{{$announce->created_at->format('d/m/Y')}}</b></i>
                                    <i class="d-block p-1 custom-abs-2"><span class="fst-italic">{{__('ui.createfrom')}}</span> <b>{{$announce->user->name}}</b></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>