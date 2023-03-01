@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header" style="color: {{$project->type->color}}">
            <h1>{{$project->type->name}}</h1>
            <img src="{{$project->type->image}}" class="img-fluid w-25" alt="">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$project['title']}}</h5>
            @if (isset($project->image))
            <img src="{{asset('storage/' . $project->image)}}" class="w-25 mt-3" alt="immagine">
            @endif
            <p class="card-text">{{$project['description']}}</p>
            <p class="card-text">{{$project['relase_date']}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</div>

@endsection