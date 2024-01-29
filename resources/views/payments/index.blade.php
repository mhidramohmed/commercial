@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="add-sale" action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-chevron-left fa-x4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-2 col-md-3">
                            <h3 class="text-muted border-bottom">
                                {{ Carbon\Carbon::now() }}
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group ">
                                <a href="{{ route('sales.index') }}" class="btn btn-outline-secondary float-end">
                                    All Sells
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                @foreach ($tables as $table)
                                    <div class="col-md-3">
                                        <div class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
                                            <div class="align-self-end">
                                                <input type="checkbox" name="table_id[]" id="table"
                                                    value="{{ $table->id }}">
                                            </div>
                                            <i class="fas fa-chair fa-5x"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{ $table->name }}
                                            </span>
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <a href="{{ route('tables.edit', $table->slug) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit fa-x2"></i>
                                                </a>
                                            </div>
                                            <hr>
                                            @foreach ($table->sales as $sale)
                                                @if ($sale->created_at >= Carbon\Carbon::today())
                                                    <div style="border:dashed pink" class="mb-2 mt-2 shadow w-100" id='{{$sale->id}}' >
                                                        <div class="card">
                                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                                @foreach ($sale->menus()->where('sales_id',$sale->id)->get() as $menu )
                                                                    <h5 class="font-weigth-bold mt-2">
                                                                        {{$menu->title}}
                                                                    </h5>
                                                                    <span class="text-muted">
                                                                        {{$menu->price}}DH
                                                                    </span>

                                                                @endforeach
                                                                <h5 class="font-weigth-bold mt-2">
                                                                    <span class="badge badge-danger">
                                                                        Serveur :{{$sale->servant->name}}
                                                                    </span>
                                                                </h5>
                                                                <h5 class="font-weigth-bold mt-2">
                                                                    <span class="badge badge-light">
                                                                        QTe :{{$sale->quantity}}
                                                                    </span>
                                                                </h5>
                                                            </div>

                                                        </div>
                                                    </div>



                                                @endif

                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body ">
                    <div class="row">
                        @foreach ($menus as $menu)
                            <div class="col-md-4 mb-2">

                                <div class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
                                    <div class="align-self-end">
                                        <input type="checkbox" name="menu_id[]" id="menu_id" value="{{ $menu->id }}">
                                    </div>
                                    <img src="{{ asset('MenuImages/'.$menu->image) }}" alt="{{ $menu->title }}" class="img-fluid rounded-circle "  style=" width:100px !important ; height:100px !important "   >
                                    <h5 class="font-weight-bold mt-2">
                                        {{ $menu->title }}
                                    </h5>
                                    <h5 class="text-muted">
                                        {{ $menu->price }}DH
                                    </h5>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3 mx-auto">
                    <div class="form-grroup">
                        <select class="form-control" name="servant_id" >
                            <option value="" selected disabled>
                                Serveur
                            </option>

                            @foreach ($serveurs as $serveur )
                                <option value="{{$serveur->id}}" >
                                    {{$serveur->name}}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                       <div class="input-group-text">QTE</div>
                    </div>
                    <input type="number" name="quantity" class="form-control" placeholder="QTE">
                </div>

                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                       <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="total_price" class="form-control" placeholder="price">
                    <div class="input-group-append">
                        <div class="input-group-text">.00</div>
                     </div>
                </div>

                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                       <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="total_received" class="form-control" placeholder="Total">
                    <div class="input-group-append">
                        <div class="input-group-text">.00</div>
                     </div>
                </div>

                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                       <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="change" class="form-control" placeholder="rest">
                    <div class="input-group-append">
                        <div class="input-group-text">.00</div>
                     </div>
                </div>

                <div class="form-grroup mt-3">
                    <select class="form-control" name="payment_type" >
                        <option value="" selected disabled>
                            Type de paiement
                        </option>
                        <option value="cash" >
                            Espece
                        </option>
                        <option value="card" >
                            Carte bancaire
                        </option>
                    </select>
                </div>

                <div class="form-grroup mt-3">
                    <select class="form-control" name="payment_status" >
                        <option value="" selected disabled>
                            Etat de paiement
                        </option>
                        <option value="paid" >
                            Paid
                        </option>
                        <option value="unpaid" >
                            Impaye
                        </option>
                    </select>
                </div>

                <div class="form_group mt-3">
                    <button onclick="event.preventDefault();document.getElementById('add-sale').submit()" class="btn btn-primary">
                        Valider
                    </button>
                </div>

            </div>


        </form>

    </div>
@endsection
