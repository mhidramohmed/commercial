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

                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i-fas class="fas fa-bars">
                                            Raports
                                        </i-fas>
                                    </h3>

                                    <a href="{{ route('categories.index') }}" class="btn btn-primary">
                                        <i class="fas fa-chevron-left fa-x2 "></i>
                                    </a>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3 shadow p-2 mx-auto">
                                                <form action="{{ route('reports.generate') }}" method="post">
                                                    @csrf
                                                    <div class="form-group ">
                                                        <input type="date" name="from" placeholder="Date start"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="date" name="to" placeholder="Date end"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group mt-2 ">
                                                        <button class="btn btn-primary">
                                                            Send
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @isset($total)
                                    <h2 class="text-info font-weight-bold">
                                        {{-- Rapport from {{$startDate}}  to {{$endDate}} --}}
                                    </h2>

                                    <table class="table table-hover tabele-responsive-sm">

                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Menu</th>
                                                <th>Tables</th>
                                                <th>Serveur</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Type de paiment</th>
                                                <th>Etat de paiment</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>{{ $sale->id }}</td>
                                                    <td>
                                                        @foreach ($sale->menus()->where('sales_id', $sale->id)->get() as $menu)
                                                            <div
                                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
                                                                {{-- <img src="{{ asset('MenuImages/'.$menu->image) }}" alt="{{ $menu->title }}" class="img-fluid rounded-circle "  style=" width:50px !important ; height:50px !important "   > --}}
                                                                <img src="MenuImages/{{ $menu->image }}"
                                                                    alt="{{ $menu->title }}" class="fluid rounded "
                                                                    width="60 " height="60">
                                                                <h5 class="font-weight-bold mt-2">
                                                                    {{ $menu->title }}
                                                                </h5>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($sale->tables()->where('sales_id', $sale->id)->get() as $table)
                                                            <div
                                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
                                                                <i class="fas fa-chair fa-5x"></i>
                                                                <span class="mt-2 text-muted font-weight-bold">
                                                                    {{ $table->name }}
                                                                </span>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $sale->servant->name }}</td>
                                                    <td>{{ $sale->quantity }}</td>
                                                    <td>{{ $sale->total_price }}</td>
                                                    <td>{{ $sale->payment_type === 'cash' ? 'espace' : 'Card' }}</td>
                                                    <td>{{ $sale->payment_status === 'paid' ? 'Payee' : 'Unpaid' }}</td>


                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                    <p class="text-success text-center font-weight-bold">
                                        <span class="border border-suceess p-2">
                                            Total : {{$total}} DH
                                        </span>
                                    </p>

                                    <form action="{{route('reports.export')}}" method="post">
                                        @csrf
                                        <div class="form-group ">
                                            <input type="hidden" name="from" value="{{$startDate}}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <input type="hidden" name="from" value="{{$endDate}}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group mt-2 ">
                                            <button class="btn btn-danger">
                                                Export
                                            </button>
                                        </div>
                                    </form>

                                @endisset



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
