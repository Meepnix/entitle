@extends('layouts.app')

@section('content')
 <div id="app">
<div class="container">
    @if (session()->has('flash_message'))
        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <h1><span class="badge badge-primary">Step F</span></h1>
            <h3>Review Complexity and Capability to consider action to be take</h3>

            



        </div>
        <span class="pull-right">
            <button type="submit" class="btn btn-primary">Next <i class="fa fa-btn fa-arrow-circle-right"></i></button>
        </span>

        <span class="pull-left">
            <a href="{{ route('stepc.show') }}" class="btn btn-primary">
                <i class="fa fa-btn fa-arrow-circle-left"></i>Back
            </a>
        </span>

    </form>






</div>

</div>

<script>


        var app = new Vue({
            el: '#app',
            data: {
                stat1: false,
                stat2: false,
            }
        })




    </script>

@endsection
