@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/home" class="btn btn-outline-secondary">
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
                        <div class="card-body">
                            <div class="row">
                                @foreach ($tables as $table)
                                    <div class="col-md-3">
                                        <div
                                            class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center list-group-item-action">
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
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-md-12 card p-3   ">
                    <ul class="nav nav-pills nav-fill mb-3" id='pills-tab' role="tablist">
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#{{ $category->slug }}"
                                    class="nav-link mr-1 {{ $category->slug === 'ftour' ? 'active' : '' }}"
                                    id="{{ $category->slug }}-tab" data-toggle='pill' aria-controls="{{ $category->slug }}"
                                    aria-selected="true" role="tab">

                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="table-content" id="pills-tabcontant">
                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel"aria-labelledby="pills-home-tab">
                                <div class="row">
                                    @foreach ($category->menus as $menu)
                                        @dd($menu)


                                        {{-- <div class="col-md-4 mb-2">
                                            <div class="card h-100">
                                                <div class="card-body d-flex flex-colum justify-content-center align-items-center">
                                                    <div class="align-self-end">
                                                        <input type="checkbox" name="menu_id[]" id="menu_id" value="{{ $menu->id }}">
                                                    </div>
                                                    <img src="{{ asset('MenuImages/' . $menu->image) }}" alt="{{ $menu->title }}" class="img-fluid rounded-circle " width="100" height="100">
                                                    <h5 class="font-weight-bold mt-2">
                                                        {{ $menu->title }}
                                                    </h5>
                                                    <h5 class="text-muted">
                                                        {{ $menu->price }}DH
                                                    </h5>
                                                </div>
                                            </div>
                                        </div> --}}
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
