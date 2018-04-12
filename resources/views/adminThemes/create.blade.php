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
                    <h2>Themes</h2>
                </div>

                <div class="panel-body">


                    <h3>Create Theme</h3>

                    <form method="POST" action="{{ route('admin.themes.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title1">Title</label>
                            <input type="text" class="form-control" id="title1" name="title" value="{{ old('title') }}"><br>
                        </div>
                        <div class="form-group">
                            <label for="scope1">Scope</label>
                            <textarea class="form-control" id="scope1" name="scope" rows="3" value="{{ old('scope') }}"></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="img1">Image</label>
                            <input class="form-control" id="img1" type="text" name="img_link" value="{{ old('img_link') }}" placeholder="\img\test.png"><br>
                        </div>
                        <div class="form-group">
                            {!! Form::label('triggers', 'Triggers CRF:') !!}
                            {!! Form::select('triggers[]', $triggersCRF, null, ['class' => 'form-control', 'multiple']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('triggers', 'Triggers YRBC:') !!}
                            {!! Form::select('triggers[]', $triggersYRBC, null, ['class' => 'form-control', 'multiple']) !!}
                        </div>

                        <button type="submit">Save</button>

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
