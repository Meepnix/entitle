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
                <div class="panel-heading"><h2>Max Themes</h2></div>

                <div class="panel-body">
                    <h3>Themes:</h3>
                    <a href="{{ route('admin.themes.create') }}" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus-square"></i>Create Type
                    </a>
                    <p></p>
                    <ul class="list-group">
                    @foreach ($theme as $themes)
                        <li class="list-group-item clearfix">{{ $themes->title }}
                            <h3>Scope:</h3>
                            <p>{{ $themes->scope }}</p>

                        </li>
                    @endforeach
                    </ul>

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
