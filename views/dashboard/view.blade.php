@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <iframe width="100%" height="100%" src={{$dash->url}} frameborder="0" style="border:0;position:absolute;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
 