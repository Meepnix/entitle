@extends('layouts.print')

@section('content')
<div class="container">
    @if (session()->has('flash_message'))
        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="print-box hidden-print">
                <i class="fa fa-print"></i> <a href="javascript:if(window.print)window.print()">Click here to print.</a>
            </div>
            <h1>Adviser actions</h1>

            @foreach($options as $option)

            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h3 class="card-title"><strong>{{ $option->title }}</strong></h3>
                    <h4 class="card-subtitle mb-2 text-muted">ADVICE</h4>
                    <p class="card-text">{{ $option->advice }}</p>
                    <h4 class="card-subtitle mb-2 text-muted">AICs</h4>
                    <p class="card-text">{{ $option->aic }}</p>
                    <h4 class="card-subtitle mb-2 text-muted">LOCAL OUTCOMES CODES</h4>
                    <p class="card-text">{{ $option->outcome }}</p>

                </div>
            </div>
            <p></p>
            @endforeach
        </div>
    </div>
</div>



@endsection
