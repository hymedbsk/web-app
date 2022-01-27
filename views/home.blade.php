@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($dashs as $dash)            
            <div class="col-md-4" align="center">
                <div class="card shadow p-3 mb-5 bg-white rounded justify-content-center">
                    <div class="card-body ">
                        <a href="{{ url('/dashboard/'.$dash->id) }}">
                            <h5 class="card-title"><i style="color:#366bfe" class="fas fa-{{$dash->icon}} fa-4x"></i></h5>
                            <p class="card-text"><strong>{{$dash->name }}</p></strong>
                            <a class="card-text"></a>
                            <a class="card-text"></a>
                            <p class="sub-card"> </p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
