<x-layout>
<section class="show-announces">
    @if (count($announces) == 0)
        <div class="container">
            <h1>{{__('ui.category-announces')}}</h1>
        </div>
    @else
        @foreach($announces as $announce)
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-category py-5">
                            <h5 class="card-title-show">{{$announce->title}}</h5>
                            <p>
                                @foreach ($announce->images as $image)
                                    <img id="img-announces" src="{{$image->getUrl(400, 200)}}" alt="">
                                @endforeach
                            </p>
                            <div class="card-body">
                                <span class="desc">{{$announce->description}}</span>
                            </div>
                            <a href="{{route('category.show', compact('announce'))}}">
                                <div class="cta-custom">
                                    <button class="cta">
                                        <span class="hover-underline-animation">Info</span>
                                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                                            <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
                                        </svg>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif



    <div class="row justify-content-center">
        <div class="col-md-8">
            {{$announces->links()}}
        </div>
    </div>
</section>
</x-layout>