@extends('layouts.admin')

@section('content')

<div class="container">
    @if (session('message'))
    <div class="alert alert-info mt-3">
        {{session('message')}}
    </div>
    @endif
    <div class="card mt-3">
        <div class="card-header text-center" style="color: {{ $project->type->color }}">
            <h1>{{$project->type->name}}</h1>
            <img src="{{$project->type->image}}" class="img-fluid w-25" alt="">
        </div>
        @if (isset($project->image))
        <img src="{{asset('storage/' . $project->image)}}" class="card-img-top w-25 mt-3 align-self-center" alt="immagine">
        @endif
        <div class="card-body text-center">
            <h5 class="card-title">{{$project['title']}}</h5>
            <p class="card-text">{{$project['description']}}</p>
            <p class="card-text">{{$project['relase_date']}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</div>

@endsection