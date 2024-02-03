@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="add-sale" action="{{ route('sales.update',$sale->id) }}" method="POST">
            @csrf
            @method("PUT")

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/payments" class="btn btn-outline-secondary">
                                    <i class="fas fa-chevron-left fa-x4"></i>
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
                                                    checked
                                                    value="{{ $table->id }}">
                                            </div>
                                            <i class="fas fa-chair fa-5x"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{ $table->name }}
                                            </span>
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
                                        <input checked type="checkbox" name="menu_id[]" id="menu_id" value="{{ $menu->id }}">
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
                                <option {{$serveur->id === $sale->servant_id ? 'selected' : ''}} value="{{$serveur->id}}" >
                                    {{$serveur->name}}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                           <div class="input-group-text">QTE</div>
                        </div>
                        <input value="{{$sale->quantity}}" type="number" name="quantity" class="form-control" placeholder="QTE">
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                           <div class="input-group-text">$</div>
                        </div>
                        <input value="{{$sale->total_price}}" type="number" name="total_price" class="form-control" placeholder="price">
                        <div class="input-group-append">
                            <div class="input-group-text">.00</div>
                         </div>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                           <div class="input-group-text">$</div>
                        </div>
                        <input value="{{$sale->total_received}}" type="number" name="total_received" class="form-control" placeholder="Total">
                        <div class="input-group-append">
                            <div class="input-group-text">.00</div>
                         </div>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                           <div class="input-group-text">$</div>
                        </div>
                        <input value="{{$sale->change}}" type="number" name="change" class="form-control" placeholder="rest">
                        <div class="input-group-append">
                            <div class="input-group-text">.00</div>
                         </div>
                    </div>

                    <div class="form-grroup mt-3">
                        <select class="form-control" name="payment_type" >
                            <option value="" selected disabled>
                                Type de paiement
                            </option>
                            <option value="cash" {{$sale->payment_type === 'cash' ? 'selected' :''}} >
                                Espece
                            </option>
                            <option value="card" {{$sale->payment_type === 'card' ? 'selected' :''}} >
                                Carte bancaire
                            </option>
                        </select>
                    </div>

                    <div class="form-grroup mt-3">
                        <select class="form-control" name="payment_status" >
                            <option value="" selected disabled>
                                Etat de paiement
                            </option>
                            <option value="paid"  {{$sale->payment_status === 'paid' ? 'selected' :''}}>
                                Paid
                            </option>
                            <option value="unpaid" {{$sale->payment_status === 'unpaid' ? 'selected' :''}} >
                                Impaye
                            </option>
                        </select>
                    </div>

                    <div class="form_group mt-3 mx-auto">
                        <button onclick="event.preventDefault();document.getElementById('add-sale').submit()" class="btn btn-primary">
                            Valider
                        </button>
                    </div>

                </div>



            </div>


        </form>

    </div>
@endsection



