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
                                        Add a Table
                                    </i>
                                </h3>
                                <form action="{{route('tables.store')}} " method="POST">
                                    @csrf
                                    <div class="form-groub">
                                        <input type="text" name="name" id='title' class="form-control" placeholder="name">
                                    </div>
                                    <div class="form-groub">
                                        <select name="status" class="form-control mt-3">
                                            <option value="" selected disabled>Disponible</option>
                                            <option value="1">OUI</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>

                                    <div class="form-groub">
                                        <button  class="btn btn-primary mt-3">
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

