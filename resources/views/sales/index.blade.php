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
                                        <i-fas class="fas fa-credit-card">
                                            Ventes
                                        </i-fas>
                                    </h3>

                                    <a href="/payments" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2 "></i>
                                    </a>
                                </div>

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
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $sale->id }}</td>
                                                <td>
                                                    @foreach ($sale->menus()->where('sales_id',$sale->id)->get() as $menu)

                                                            <div class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
                                                                {{-- <img src="{{ asset('MenuImages/'.$menu->image) }}" alt="{{ $menu->title }}" class="img-fluid rounded-circle "  style=" width:50px !important ; height:50px !important "   > --}}
                                                                <img src="MenuImages/{{ $menu->image }}" alt="{{ $menu->title }}" class="fluid rounded " width="60 " height="60">
                                                                <h5 class="font-weight-bold mt-2">
                                                                    {{ $menu->title }}
                                                                </h5>
                                                            </div>


                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($sale->tables()->where('sales_id',$sale->id)->get() as $table)

                                                        <div class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
                                                            <i class="fas fa-chair fa-5x"></i>
                                                            <span class="mt-2 text-muted font-weight-bold">
                                                                {{ $table->name }}
                                                            </span>
                                                        </div>

                                                    @endforeach
                                                </td>
                                                <td>{{ $sale->servant->name }}</td>
                                                <td>{{ $sale->quantity}}</td>
                                                <td>{{ $sale->total_price}}</td>
                                                <td>{{ $sale->payment_type === 'cash' ? 'espace' : "Card"}}</td>
                                                <td>{{ $sale->payment_status === 'paid' ? 'Payee' : "Unpaid"}}</td>


                                                {{-- <td>
                                                    <img src="MenuImages/{{ $menu->image }}"
                                                        alt="{{ $menu->title }}" class="fluid rounded " width="60 "
                                                        height="60">
                                                </td> --}}
                                                <td class=" flex-row justify-content-center  align-items-center mb-2">

                                                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">
                                                        <i class="fas fa-edit fa-x2 "></i>
                                                    </a>
                                                    <form id="{{ $sale->id }}"
                                                        action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="event.preventDefault();
                                                        if(confirm('Do u want to delet sale {{ $sale->id }}'))
                                                        document.getElementById({{ $sale->id }}).submit();
                                                        ">

                                                            <i class="fas fa-trash fa-x2"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    {{ $sales->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
