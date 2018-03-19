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
                <div class="panel-heading"><h2>Identify max themes:</h2></div>
                <div class="panel-body">

                    @foreach ($themes as $theme)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('img/test.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $theme->title }}</h5>
                            <a href="{{ route('options.show', [$theme->id]) }}" class="btn btn-primary">Max options</a>
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