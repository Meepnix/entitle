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
                    <a href="{{ route('admin.triggers.create') }}" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus-square"></i>Create Filter
                    </a>
                <div class="panel-body">

                    @foreach ($triggers as $key => $trigger)
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="heading{{ $key }}">
                                <h5 class="mb-0">
                                    <p>
                                        {{ $trigger->type }}
                                    </p>

                                    <p>
                                        {{ $trigger->trigger }}
                                    </p>

                                </h5>

                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.triggers.edit', [$trigger]) }}" class="btn btn-primary">Edit</a>
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
