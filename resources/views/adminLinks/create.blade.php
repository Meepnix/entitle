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
                    <h1>Links</h1>
                </div>

                <div class="panel-body">


                    <h3>Create Link</h3>

                    <form method="POST" action="{{ route('admin.links.store', [$option]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title1">Title</label>
                            <input type="text" class="form-control" id="title1" name="title" value="{{ old('title') }}"><br>
                        </div>
                        <div class="form-group">
                            <label for="link1">Link</label>
                            <input type="text" class="form-control" id="link1" name="link" value="{{ old('link') }}"><br>
                        </div>

                        <button type="submit">Save</button>

                    </form>
                    <a href="{{ route('admin.options.edit', [$option]) }}" class="btn btn-default">Back</a>

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
