@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Dashboard') }}</div>
                <div class="card-body">
                    @csrf
                    {!! Form::model($dash,['route' => ['dashboard.update', $dash->id], 'method' => 'put', 'class'=>'form-horizontal panel']) !!}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            {!! Form::text('name', $dash->name, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Url') }}</label>
                        <div class="col-md-6">
                            {!! Form::text('url', $dash->url, ['class' => 'form-control'])
                            !!}
                            {!! $errors->first('url', '<small class="help-block">:message</small>') !!}
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label for="icon" class="col-md-4 col-form-label text-md-end">{{ __('Icon') }}</label>
                        <div class="col-md-6">
                            {!! Form::text('icon', $dash->icon, ['class' => 'form-control'])
                            !!}
                            {!! $errors->first('icon', '<small class="help-block">:message</small>') !!} 
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
