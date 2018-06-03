@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('flash_message'))
        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Admin Themes</h2></div>
                    <a style="margin-bottom: 1.5em;" href="{{ route('admin.themes.create') }}" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus-square"></i>Create theme
                    </a>
                <div class="panel-body">

                    @foreach ($themes as $key => $theme)
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="heading{{ $key }}">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                        {{ $theme->title }}
                                    </a>
                                    <span class="pull-right">

                                        <a href="{{ route('admin.themes.edit', [$theme->id]) }}" class="btn btn-secondary">
                                            <i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit
                                        </a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteTheme{{ $theme->id }}">
                                            <i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete
                                        </a>
                                    </span>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteTheme{{ $theme->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Theme</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you wish to continue and delete theme {{ $theme->title }}?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.themes.delete', [$theme->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Yes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </h5>

                        </div>

                            <div id="collapse{{ $key }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                                <div class="card-body">
                                    <a style="margin-bottom: 1.5em;" href="{{ route('admin.options.create', [$theme->id]) }}" class="btn btn-primary">
                                        <i class="fa fa-btn fa-plus-square"></i>Create option
                                    </a>
                                    @foreach ($theme->options as $option)
                                    <li class="list-group-item clearfix">
                                        {{ $option->title }}

                                        <span class="pull-right">
                                            <a href="{{ route('admin.options.edit', [$option]) }}" class="btn btn-secondary">
                                                <i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit
                                            </a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteOption{{ $option->id }}">
                                                <i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete
                                            </a>
                                        </span>


                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteOption{{ $option->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Option</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you wish to continue and delete option {{ $option->title }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('admin.options.delete', [$option->id]) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">Yes
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
