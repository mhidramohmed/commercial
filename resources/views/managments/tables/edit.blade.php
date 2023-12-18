@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                sidebar
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus">
                                        Update a Table {{$table->name}}
                                    </i>
                                </h3>
                                <form action="{{route('tables.update',$table->slug)}} " method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-groub">
                                        <input type="text"
                                            name="name"
                                            id='name'
                                            class="form-control"
                                            placeholder="name"
                                            value="{{$table->name}}"
                                        >
                                    </div>
                                    <div class="form-groub">
                                        <select name="status" class="form-control mt-3">
                                            <option value=""  disabled></option>
                                            <option {{$table->status === 1 ? 'selected':''}} value="1">OUI</option>
                                            <option {{$table->status === 0 ? 'selected':''}} value="0">NO</option>
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

