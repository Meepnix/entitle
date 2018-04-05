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
            <h1><span class="badge badge-primary">Step A</span></h1>
            <h1 class="font-weight-bold">Identifying and taking action to claim entitlement</h1>

            <div class="alert alert-primary" role="alert">NB This work flow is designed to be used in conjuction with the Client Registration form and the Your Benefit Fights Information Sheet</div>

            <h3>First Check the CRF and Your Benefit Rights info sheets are fully completed: if not complete additional info with client</h3>

            <span class="pull-right">
                <a href="{{ route('stepb.show') }}" class="btn btn-primary">
                    Next <i class="fa fa-btn fa-arrow-circle-right"></i>
                </a>
            </span>


        </div>

    </div>

</div>
@endsection
