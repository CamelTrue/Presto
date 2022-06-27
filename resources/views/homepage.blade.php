<x-layout>


    @if(session('flash'))
        <div class="alert alert-danger">{{__('ui.reserved')}}</div>
    @endif





    <div class="modal-custom-home">
        <p class="text-modal">{{__('ui.categories')}}</p>
        <i class="fa-solid fa-arrow-right icon-modal"></i>
    </div>

    <div class="container-categories">
        <div class="exit-categories"><i class="fa-solid fa-circle-xmark x-icon fa-2x icon-categories"></i></div>
        @foreach($categories as $category)
            <ul>
                <li>
                    <a class="x-icon" href="{{route('category.announces', compact('category'))}}">
                        {{$category->name}}
                    </a>
                </li>
            </ul>
        @endforeach
    </div>




    <h1 class="header-title-aos" data-aos="fade-up">{{__('ui.welcome')}}</h1>

    {{-- inizio header --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="d-flex search-custom my-2" action="{{route('search')}}" method="get">
                    <input  class="form-control me-2" name="q" type="text" placeholder="{{__('ui.plh-search')}}" aria-label="Search">
                    <button class="btn btn-search-custom" type="submit">{{__('ui.search')}}</button>
                </form>
            </div>
            <div class="col-12 p-0">
                <img  class="header-homepage img-fluid" src="../img/img-aggiunte/header3.jpg" alt="sfondo">
            </div>
        </div>
    </div>
    {{-- fine header --}}


    {{-- CARD CHE COMPAGLIONO SU HOMEPAGE --}}
    <section class="container-fluid" id="section">
        <div class="title-announce-sec d-flex justify-content-center align-items-center" data-aos="fade-right">
            <h3 class="title-action">{{__('ui.look')}}</h3>
        </div>
        <div class="row justify-content-center align-items-center">
            @foreach($announces as $announce)
                <div class="col-12 col-md-6 col-lg-3 my-5">
                    <a href="{{route('category.show', compact('announce'))}}">
                        <div class="card custom-card " >
                            <h5 >{{$announce->title}}</h5>
                            <img src="{{$announce->images->first()->getUrl(400, 200)}}" class="rounded " alt="">
                            <div class="card-body">
                                <div>
                                    <p>
                                        {{$announce->description}}
                                    </p>
                                </div>
                                <div class=" justify-content-center align-items-center">
                                    <a class="link-announce">{{$announce->category->name}}</a>
                                    <i class="d-block p-1 custom-abs-1"><span class="fst-italic">{{__('ui.createat')}}</span><b>{{$announce->created_at->format('d/m/Y')}}</b></i>
                                    <i class="d-block p-1 custom-abs-2"><span class="fst-italic">{{__('ui.createfrom')}}</span><b>{{$announce->user->name}}</b></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- FINE CARD HOMEPAGE --}}

</x-layout>