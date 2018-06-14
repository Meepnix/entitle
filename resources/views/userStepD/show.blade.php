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
            <h1><span class="badge badge-primary">Step D</span></h1>
            <h3>Undertake "Turn2us" Basic Benefit Assessment</h3>
            <p>Check current entitlement to means tested benefits at</p>
            <a href="https://benefits-calculator.turn2us.org.uk/AboutYou" target="_blank" class="btn btn-secondary">
                Turn2us Benefits Calculator
            </a>
            <p>
                <input type="checkbox" id="Check1" v-model="stat1" :disabled="stat2">
                <label for="Check1">Additional MT benefit suggested</label>
            </p>
            <div v-if="stat1" class="alert alert-danger" role="alert">
                <p>Record potential max, relevant tags</p>
            </div>

        </div>



    </div>
    <form method="POST" action="{{ route('snaps.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <h3>CRF Questions answered</h3>
                @foreach ($triggersCRF as $triggerCRF)
                    {!! Form::label($triggerCRF->trigger, $triggerCRF->trigger); !!}
                    {!! Form::checkbox('triggers[]', $triggerCRF->id) !!}
                @endforeach

                </div>

            <div class="col">
                <h3>YRBC Questions answered</h3>
                @foreach ($triggersYRBC as $triggerYRBC)
                    {!! Form::label($triggerYRBC->trigger, $triggerYRBC->trigger); !!}
                    {!! Form::checkbox('triggers[]', $triggerYRBC->id) !!}
                @endforeach

            </div>


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
