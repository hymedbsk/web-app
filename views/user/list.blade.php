@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users list') }}</div>

                <div class="card-body table-responsive">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Firstname</th>
                                <th>Email</th>
                                <th>Last login</th>
                                <th></th>
                                <th>Actions</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-primary">{!! $user->name !!}</td>
                                    <td class="text-primary"><strong>{!! $user->firstname !!}</strong></td>
                                    <td class="text-primary"><strong>{!! $user->email !!}</strong></td>
                                    <td class="text-primary"><strong>{!! $user->last_login_at !!}  {!! $user->last_login_ip!!}</strong></td>
                                    <td>
                                        {!! link_to_route('user.edit', 'Edit', [$user->id], ['class' => 'btn btn-primary btn-block']) !!}
                                    </td>
                                    <td>
                                        @if($user->admin == 0)
                                            {!! Form::open([ 'method'=>'put', 'route' => ['role.add', $user->id, 'method'=>'put']]) !!}
                                            {!! Form::submit('Set Admin', ['class' => 'btn btn-success btn-block', 'onclick' =>
                                            'return confirm(\'Do you really want to set this user to admin ?\')']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                        @if($user->admin == 1)

                                            {!! Form::open([ 'method'=>'put', 'route' => ['role.add', $user->id, 'method'=>'put']]) !!}
                                            {!! Form::submit('Remove Admin privilege', ['class' => 'btn btn-warning btn-block', 'onclick' =>
                                            'return confirm(\'Do you really want to set this admin to user ?\')']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->dashboard_viewer == 0)
                                            {!! Form::open([ 'method'=>'put', 'route' => ['dashboard.add', $user->id, 'method'=>'put']]) !!}
                                            {!! Form::submit('Set Dashboard Viewer', ['class' => 'btn btn-info btn-block', 'onclick' =>
                                            'return confirm(\'Do you really want to set this user to dashboard viewer ?\')']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                        @if($user->dashboard_viewer == 1)
                                            {!! Form::open([ 'method'=>'put', 'route' => ['dashboard.add', $user->id, 'method'=>'put']]) !!}
                                            {!! Form::submit('Remove Dashboard Viewer privilege', ['class' => 'btn btn-warning btn-block', 'onclick' =>
                                            'return confirm(\'Do you really want to remove dashboard viewer to this viewer ?\')']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                      <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Do you realy want to delete this user ?\')']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                {!! link_to_route('user.create', 'Create user', [], ['class' => 'btn btn-info pull-right']) !!}
            </div>
        </div>
    </div>
</div>
@endsection
