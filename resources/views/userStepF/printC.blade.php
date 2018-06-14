@extends('layouts.print')

@section('content')
<div class="container-fluid">
    @if (session()->has('flash_message'))
        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="d-print-none">
                <i class="fa fa-print"></i> <a href="javascript:if(window.print)window.print()">Click here to print.</a>
            </div>
            <h1>Client actions</h1>

            @foreach ($options as $option)

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><strong>{{ $option->title }}</strong></h3>
                    <h4 class="card-subtitle mb-2 text-muted">LINKS</h4>
                    @foreach ($option->links as $link)
                    <h5 class="card-text">{{ $link->title }}</h5>
                    <p class="card-text">{{ $link->link }}</p>
                    @endforeach
                </div>
            </div>
            <p></p>
            @endforeach
        </div>
    </div>
</div>



@endsection
