<x-layout>
    
    @if($announce)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            {{__('ui.announce-title')}} # {{$announce->id}}
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3>{{__('ui.user-name')}}</h3>
                                    </div>
                                    <div class="col-md-10">
                                        #
                                        {{$announce->user->id}},
                                        {{$announce->user->name}},
                                        {{$announce->user->email}},
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3>{{__('ui.product-title')}}</h3>
                                    </div>
                                    <div class="col-md-10">
                                        {{$announce->title}}
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3>{{__('ui.product-description')}}</h3>
                                    </div>
                                    <div class="col-md-10">
                                        {{$announce->description}}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h3>{{__('ui.product-images')}}</h3>
                                        <div class="row">
                                        @foreach ($announce->images as $image) 
                                            <div class="col-mb-2">
                                                <img src="{{$image->getUrl(400, 200)}}" class="rounded" alt="">
                                            </div>
                                            <div class="col-mb-2">
                                                Adult: {{$image->adult}} <br>
                                                Spoof: {{$image->spoof}} <br>
                                                Medical: {{$image->medical}} <br>
                                                Violence: {{$image->violence}} <br>
                                                Racy: {{$image->racy}} <br>
                                            </div>
                                            <b>Labels:</b><br>
                                                <ul>
                                                    @if ($image->labels)
                                                        <br>
                                                        @foreach ($image->labels as $label)
                                                            {{$label}}
                                                        @endforeach
                                                    @endif
                                                </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <form action="{{route('revisor.reject', $announce->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('ui.btn-remove')}}</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{route('revisor.accept', $announce->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">{{__('ui.btn-accept')}}</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3>{{__('ui.no-review-announce')}}</h3>
                </div>
            </div>
        </div>
        <form action="{{route('revisor.undo')}}" method="post">
            
            @csrf

            <button type="submit" class="btn btn-warning align-self-end">{{__('ui.undo-operation')}}</button>
        </form>
    @endif
    
</x-layout>