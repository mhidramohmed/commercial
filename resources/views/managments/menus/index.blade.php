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
                                        <i-fas class="fas fa-clipboard-list">
                                            Menu
                                        </i-fas>
                                    </h3>

                                    <a href="{{ route('menus.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2 "></i>
                                    </a>
                                </div>

                                <table class="table table-hover tabele-responsive-sm">

                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->id }}</td>
                                                <td>{{ $menu->title }}</td>
                                                <td>{{ substr($menu->description, 0, 10) }}</td>
                                                <td>{{ $menu->price }}DH</td>
                                                <td>{{ $menu->category->title }}</td>
                                                <td>
                                                    <img src="{{ asset('MenuImages/' . $menu->image) }}"
                                                        alt="{{ $menu->title }}" class="fluid rounded " width="60 "
                                                        height="60">
                                                </td>
                                                <td class=" flex-row justify-content-center  align-items-center mb-2">

                                                    <a href="{{ route('menus.edit', $menu->slug) }}" class="btn btn-warning">
                                                        <i class="fas fa-edit fa-x2 "></i>
                                                    </a>
                                                    <form id="{{ $menu->id }}"
                                                        action="{{ route('menus.destroy', $menu->slug) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="event.preventDefault();
                                                        if(confirm('Do u want to delet menu {{ $menu->title }}'))
                                                        document.getElementById({{ $menu->id }}).submit();
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
                                    {{ $menus->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
