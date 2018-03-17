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
                        Title:<br>
                        <input type="text" name="title" value="{{ old('title') }}"><br>
                        Scope:<br>
                        <input type="text" name="scope" value="{{ old('scope') }}"><br>

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
