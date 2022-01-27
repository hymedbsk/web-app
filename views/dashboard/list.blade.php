@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Manager') }}</div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Icon</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dashs as $dash)
                                <tr>
                                    <td class="text-primary">{!! $dash->name !!}</td>
                                    <td class="text-primary"><strong>{!! $dash->url !!}</strong></td>
                                    <td class="text-primary"><strong>{!! $dash->icon !!}</strong></td>
                                    <td>
                                        {!! link_to_route('dashboard.edit', 'Edit', [$dash->id], ['class' => 'btn btn-warning btn-block']) !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['dashboard.destroy', $dash->id]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Do you realy want to delete this dashboard ?\')']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                    {!! link_to_route('dashboard.create', 'Create dashboard', [], ['class' => 'btn btn-info pull-right']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
