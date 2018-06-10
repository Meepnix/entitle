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
            @foreach($options as $option)

            <h3>{{ $option->title }}</h3>

            <p>{{ $option->advice }}</p>

            @endforeach
        </div>
    </div>
</div>



@endsection
