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


                    <h3>Create Option</h3>

                    <form method="POST" action="{{ route('admin.options.store', [$theme->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title1">Title</label>
                            <input type="text" class="form-control" id="title1" name="title" value="{{ old('title') }}"><br>
                        </div>
                        <div class="form-group">
                            <label for="advice1">Advice</label>
                            <textarea class="form-control" id="advice1" name="advice" rows="3" value="{{ old('advice') }}"></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="refs1">Advice Guide Ref and Link</label>
                            <textarea class="form-control" id="refs1" name="refs" rows="3" value="{{ old('refs') }}"></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="aic1">AIC and local outcome codes</label>
                            <textarea class="form-control" id="aic1" name="aic" rows="3" value="{{ old('aic') }}"></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="refs1">Referral Tag</label>
                            <textarea class="form-control" id="refs1" name="tags" rows="3" value="{{ old('tags') }}"></textarea><br>
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
