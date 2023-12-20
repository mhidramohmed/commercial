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
                                    <i-fas class="fas fa-user-gear">
                                        Serveurs
                                    </i-fas>
                                </h3>

                                <a href="{{route('serveurs.create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus fa-x2 "></i>
                                </a>
                            </div>

                            <table class="table table-hover tabele-responsive-sm">

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Adress</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($serveurs as $serveur)
                                        <tr>
                                            <td>{{$serveur->id}}</td>
                                            <td>{{$serveur->name}}</td>
                                            <td>
                                                @if ($serveur->adress)
                                                    {{$serveur->adress}}
                                                @else
                                                    <div class="text-danger">
                                                        Not Disponible
                                                    </div>

                                                @endif
                                            </td>
                                            <td class="d-flex flex-row justify-content-center align-items-center">

                                                <a href="{{route('serveurs.edit',$serveur->id)}}" class="btn btn-warning">
                                                    <i class="fas fa-edit fa-x2 "></i>
                                                </a>
                                                <form id="{{$serveur->id}}" action="{{route('serveurs.destroy',$serveur->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        onclick="event.preventDefault();
                                                        if(confirm('Do u want to delet serveur {{$serveur->id}}'))
                                                        document.getElementById({{$serveur->id }}).submit();
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
                                {{$serveurs->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
