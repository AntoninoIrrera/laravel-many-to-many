@extends('layouts.admin')

@section('script')
@vite(['resources/js/popupDelete.js'])
@endsection

@section('content')

<div class="container">
    <div class="row my-3">
        <div class="col-6">
            @if (session('message'))
            <div class="alert alert-info mt-3 d-inline-block">
                {{session('message')}}
            </div>
            @endif
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <a href="{{route('admin.technology.create')}}" class="btn btn-secondary"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">color</th>
                <th scope="col">versione</th>
                <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technologies as $technology)
            <tr>
                <th scope="row">{{$technology['id']}}</th>
                <td>{{$technology['name']}}</td>
                <td>{{$technology['color']}}</td>
                <td>{{$technology['versione']}}</td>
                <td>
                    <a href="{{route('admin.technology.show',$technology['id'])}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.technology.edit',$technology['id'])}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                    <form class="d-inline-block double-confirm" action="{{route('admin.technology.destroy',$technology->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $technologies->links() }}
</div>

@endsection