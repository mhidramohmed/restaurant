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
                                    <i-fas class="fas fa-chair">
                                        Tables
                                    </i-fas>
                                </h3>

                                <a href="{{route('tables.create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus fa-x2 "></i>
                                </a>
                            </div>

                            <table class="table table-hover tabele-responsive-sm">

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Disponible</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($tables as $table)
                                        <tr>
                                            <td>{{$table->id}}</td>
                                            <td>{{$table->name}}</td>
                                            <td>
                                                @if ($table->status)
                                                    <span class="badge bg-success">
                                                        OUI
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        NO
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="d-flex flex-row justify-content-center align-items-center">

                                                <a href="{{route('tables.edit',$table->slug)}}" class="btn btn-warning">
                                                    <i class="fas fa-edit fa-x2 "></i>
                                                </a>
                                                <form id="{{$table->id}}" action="{{route('tables.destroy',$table->slug)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        onclick="event.preventDefault();
                                                        if(confirm('Do u want to delet table {{$table->name}}'))
                                                        document.getElementById({{$table->id }}).submit();
                                                        ">

                                                        <i class="fas fa-trash fa-x2"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            <div class="my-3    d-flex flex-row justify-content-center align-items-center ">
                                    {{$tables->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
