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
                <h1><span class="badge badge-primary">Step E</span></h1>
                <div class="panel-heading"><h2>Identify max themes:</h2></div>
                <div class="panel-body">

                    @foreach ($themes as $theme)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('img/test.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $theme->title }}</h5>
                            <a href="{{ route('options.show', [$snap->id, $theme->id]) }}" class="btn btn-primary">Max options</a>
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

                    <span class="pull-left">
                        <a href="{{ route('stepd.show') }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-arrow-circle-left"></i>Back
                        </a>
                    </span>

                    <span class="pull-right">
                        <a href="{{ route('stepf.show', [$snap]) }}" class="btn btn-primary">
                            Next <i class="fa fa-btn fa-arrow-circle-right"></i>
                        </a>
                    </span>

                </div>


            </div>

        </div>
    </div>
</div>
@endsection
