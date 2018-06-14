@extends('layouts.app')

@section('content')

<div class="container">
    @if (session()->has('flash_message'))

        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>

    @endif

    <div class="row">
        <div class="col">
            <h1><span class="badge badge-primary">Step F</span></h1>

            <a href="{{ route('printA.show', [$snap])}}" target="_blank" class="btn btn-secondary">
                Adviser Actions
            </a>

            <a href="{{ route('printC.show', [$snap])}}" target="_blank" class="btn btn-secondary">
                Client Actions
            </a>
            
        </div>
    </div>

    <span class="pull-right">
        <button type="submit" class="btn btn-primary">Next <i class="fa fa-btn fa-arrow-circle-right"></i></button>
    </span>

    <span class="pull-left">
        <a href="{{ route('themes.show', [$snap]) }}" class="btn btn-primary">
            <i class="fa fa-btn fa-arrow-circle-left"></i>Back
        </a>
    </span>

</div>



@endsection
