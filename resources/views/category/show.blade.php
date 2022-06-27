<x-layout>
<section class="show-announces">
    <h1 class="title-action-show">{{__('ui.welcome2')}}</h1>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card card-show">
                <div class="card-header">
                    {{-- <p class="card-title show-category">{{$announce->category->name}}</p> --}}
                    <p class="card-title-show">{{$announce->title}}</p>
                    <p class="card-body">{{$announce->description}}</p>
                    <p>
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($announce->images as $image)
                                    <div class="carousel-item @if($image == $announce->images[0]) active @endif">
                                        <img class="img-fluid"src="{{$image->getUrl(1000, 1000)}}" class="rounded" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </p>
                    <a class="show-category" href="{{route('category.announces',['category'=> $announce->category->id, 'name' => $announce->category->name])}}">{{$announce->category->name}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
</x-layout>