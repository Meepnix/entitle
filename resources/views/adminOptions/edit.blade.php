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
                <div class="panel-heading">
                    <h1>Options</h1>
                </div>

                <div class="panel-body">


                    <h3>Edit Option</h3>

                    <form method="POST" action="{{ route('admin.options.update', [$option->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="title1">Title</label>
                            <input type="text" class="form-control" id="title1" name="title" value="{{ $option->title }}"><br>
                        </div>
                        <div class="form-group">
                            <label for="advice1">Advice</label>
                            <textarea class="form-control" id="advice1" name="advice" rows="3" value="{{ $option->advice }}">{{ $option->advice }}</textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="aic1">AIC</label>
                            <textarea class="form-control" id="aic1" name="aic" rows="3" value="{{ $option->aic }}">{{ $option->aic }}</textarea><br>
                        </div>

                        <div class="form-group">
                            <label for="outcome1">Local Outcomes</label>
                            <textarea class="form-control" id="outcome1" name="outcome" rows="3" value="{{ $option->outcome }}"></textarea><br>
                        </div>

                        <div style="margin-bottom: 1.5em;" class="form-group">
                            <label>Reference Links</label>
                        <div>
                        <a style="margin-bottom: 1.5em;" href="{{ route('admin.links.create', [$option]) }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-plus-square"></i>Add link
                        </a>
                    </div>
                        @foreach ($option->links as $link)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $link->title }}</h5>
                                <a href="http://{{ $link->link }}" class="card-link">{{ $link->link }}</a>

                                <span class="pull-right">
                                    <a href="{{ route('admin.links.edit', [$option, $link]) }}" class="btn btn-secondary">
                                        <i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit
                                    </a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteOption{{ $option->id }}">
                                        <i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete
                                    </a>
                                </span>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteOption{{ $link->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModal">Delete Theme</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you wish to continue and delete link ref {{ $link->title }}?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.links.delete', [$link->id]) }}" method="POST">
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
                            </div>
                        </div>
                        @endforeach

                    </div>

                        <div>

                            <button type="submit">Save</button>
                        </div>

                    </form>

                    <a href="{{ route('admin.themes.show') }}" class="btn btn-default">Back</a>

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
