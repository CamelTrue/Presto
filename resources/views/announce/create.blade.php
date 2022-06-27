<x-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <h2 data-aos="fade-left" class="custom-header-title-create-announce">{{__('ui.title-create')}}</h2> 
            </div>
        </div>
    </div>

    <div class="img-backgound-create-announce"></div>

    <div class=" container-fluid c-custom">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-10">
                
                <form action="{{route('announce.store')}}" method="post" data-aos="fade-left">
                    @csrf
                    <input
                        type="hidden"
                        name="uniqueSecret"
                        value="{{$uniqueSecret}}">

                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">{{__('ui.title-form')}}</label>
                        <input name="title" type="text" class="form-control @error ('title') is-invalid @enderror" id="inputTitle" aria-describedby="emailHelp" value="{{old('title')}}" placeholder="{{__('ui.plh-inputTitle')}}">
                        <div class="text-center">
                            @error('title')
                            <div class="p-0 text-center text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label label-mt">{{__('ui.description-form')}}</label>
                        <textarea name="description" type="text" class="form-control @error ('description') is-invalid @enderror" id="inputPassword" aria-describedby="emailHelp" cols="30" rows="10" placeholder="{{__('ui.plh-inputDescription')}}">{{old('description')}}</textarea>
                        <div class="text-center">
                            @error('description')
                            <div class="p-0 text-center text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="mb-3 mx-3">
                            <label for="inputPrice" class="form-label label-mt">{{__('ui.price-form')}}</label>
                            <input name="price" type="number" placeholder="{{__('ui.plh-price-form')}}" class="form-control @error ('price') is-invalid @enderror" id="inputPrice" value="{{old('price')}}">
                            <div class="text-center">
                                @error('price')
                                <div class="p-0 text-center text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 mx-3 d-flex flex-column">
                            <label for="categoryInput" class="form-label select-mt">{{__('ui.form-category')}}</label>
                        <select name="category" id="categoryInput">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(old($category->id) == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="images" class="col-md-12 col-form-label text-md-right">{{__('ui.image-form')}}</label>
                        <div class="col-md-12">
                            <div class="dropzone" id="drophere"></div>

                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="cta-custom">
                        <button type="submit" class="cta">
                            <span class="hover-underline-animation">{{__('ui.btn-create-article')}}</span>
                            <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                                <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
                            </svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="separator">

    </div>

</x-layout>
