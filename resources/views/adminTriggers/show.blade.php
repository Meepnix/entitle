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
                <div class="panel-heading"><h2>Admin Filters</h2></div>
                    <a style="margin-bottom: 1.5em;" href="{{ route('admin.triggers.create') }}" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus-square"></i>Create Filter
                    </a>
                <div class="panel-body">

                    @foreach ($triggers as $key => $trigger)
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="heading{{ $key }}">
                                <h5 class="mb-0">
                                    <h4>Form:</h4>
                                    <p>
                                        {{ $trigger->type }}
                                    </p>
                                    <h4>Question:</h4>
                                    <p>
                                        {{ $trigger->trigger }}
                                    </p>

                                </h5>

                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.triggers.edit', [$trigger]) }}" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteTheme{{ $trigger->id }}">
                                    <i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete
                                </a>

                            </div>



                    <!-- Modal -->
                    <div class="modal fade" id="deleteTheme{{ $trigger->id }}" tabindex="-1" role="dialog" aria-labelledby="DeteleModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="DeteleModal">Delete Filter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you wish to continue and delete filter?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.triggers.delete', [$trigger->id]) }}" method="POST">
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
