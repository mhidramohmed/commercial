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
                                        Update  Menu {{$menu->title}}
                                    </i>
                                </h3>
                                <form action="{{route('menus.update',$menu->slug)}} " method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-groub">
                                        <input type="text"
                                            name="title"
                                            id='title'
                                            class="form-control"
                                            placeholder="title"
                                            value="{{$menu->title}}"
                                        >
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" rows="5" cols="30" name="description" value="{{$menu->description}}">
                                        </textarea>
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend">
                                           <div class="input-group-text">$</div>
                                        </div>
                                        <input type="number" name="price" class="form-control" value="{{$menu->price}}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">.00</div>
                                         </div>
                                    </div>
                                    <td>
                                        <img src="{{asset('MenuImages/'.$menu->image)}}" alt="{{$menu->title}}"
                                            class="fluid mt-3 img-fluid " width="200 " height="200">
                                    </td>
                                    <div class="form-group mt-3">
                                            <input type="file" name="image" class="form-control"  >
                                    </div>
                                    <div class="form-group mt-3">
                                        <select class="form-control" name="category_id" >
                                            <option   value="" disabled ></option>
                                            @foreach ($categories as $category ){
                                                <option {{$category->id === $menu->category_id ? 'selected':''}}  value="{{$category->id}}">{{$category->title}}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-groub">
                                        <button class="btn btn-primary mt-3">
                                            Update
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

