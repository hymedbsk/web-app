@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update user') }}</div>

                <div class="card-body">
                    @csrf
                    {!! Form::model($user,['route' => ['user.update', $user->id], 'method' => 'put', 'class'=>'form-horizontal panel']) !!}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Firstname') }}</label>
                        <div class="col-md-6">
                            {!! Form::text('firstname', $user->firstname, ['class' => 'form-control', 'placeholder' => 'Firstname'])
                            !!}
                            {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])
                            !!}
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right']) !!}
                            <a href={{ url('user/'.$user->id.'/edit/password')}} class="btn btn-info float-right">Edit password</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
