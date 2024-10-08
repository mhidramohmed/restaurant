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
                                    <i-fas class="fas fa-th-list">
                                        Categories
                                    </i-fas>
                                </h3>

                                <a href="{{route('categories.create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus fa-x2 "></i>
                                </a>
                            </div>

                            <table class="table table-hover tabele-responsive-sm">

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @isset($caregories)
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->title}}</td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">

                                                    <a href="{{route('categories.edit',$category->slug)}}" class="btn btn-warning">
                                                        <i class="fas fa-edit fa-x2 "></i>
                                                    </a>
                                                    <form id="{{$category->id}}" action="{{route('categories.destroy',$category->slug)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="event.preventDefault();
                                                            if(confirm('Do u want to delet Category {{$category->title}}'))
                                                            document.getElementById({{$category->id }}).submit();
                                                            ">

                                                            <i class="fas fa-trash fa-x2"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>

                                        @endforeach
                                    @endisset



                                </tbody>
                            </table>

                            @isset($categories)
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    {{$categories->links('pagination::bootstrap-4')}}
                                </div>
                            @endisset


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
