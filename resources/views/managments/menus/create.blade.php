@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus">
                                        Add a Menu
                                    </i>
                                </h3>
                                <form action="{{route('menus.store')}} " method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="title" id='title' class="form-control" placeholder="title">
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" rows="5" cols="30" name="description" placeholder="Description">
                                        </textarea>
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend">
                                           <div class="input-group-text">$</div>
                                        </div>
                                        <input type="number" name="price" class="form-control" placeholder="price">
                                        <div class="input-group-append">
                                            <div class="input-group-text">.00</div>
                                         </div>
                                    </div>
                                    <div class="form-group mt-3">
                                            <input type="file" name="image" class="form-control" >
                                    </div>
                                    <div class="form-group mt-3">
                                        <select class="form-control" name="category_id" >
                                            <option   value="" selected disabled >Chouse Category</option>
                                            @foreach ($categories as $category ){
                                                <option  value="{{$category->id}}">{{$category->title}}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary mt-3">
                                            Valider
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

