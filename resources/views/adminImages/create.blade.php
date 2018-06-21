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
                    <h1>Images</h1>
                </div>

                <div class="panel-body">


                    <h3>Upload Image</h3>

                    <form method="POST" action="{{ route('admin.images.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title1">Name</label>
                            <input type="text" class="form-control" id="title1" name="name" value="{{ old('name') }}"><br>
                        </div>
                        <div class="form-group">
                            <label for="image1">Image</label>
                            <input type="file" class="form-control" id="link1" name="image" value="{{ old('image') }}"><br>
                        </div>

                        <button type="submit">Upload</button>

                    </form>


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
