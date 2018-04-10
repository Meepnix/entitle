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
            <h1><span class="badge badge-primary">Step B</span></h1>
            <h3>First consider if the circumstances meet Capability or Complexity requirements</h3>

            <div class="row">
                <div class="col">
                    <h3>CAPABILTY</h3>
                    <p>Where person with a benefit problems:</p>
                    <p>
                        <input type="checkbox" id="Check1" v-model="stat1">
                        <label for="Check1">Has Mental Health or "stress" issue</label>
                    </p>

                    <input type="checkbox" id="Check2" v-model="stat2">
                    <label for="Check2">Learning Disabilites</label>
                </div>
                <div class="col">
                    <h3>COMPLEXITY</h3>
                    <p>Where the issue being presented concerns:</p>
                    <p>
                        <input type="checkbox" id="Check3" v-model="stat3">
                        <label for="Check3">Cohabitation cases</label>
                    </p>

                    </p>
                        <input type="checkbox" id="Check4" v-model="stat4">
                        <label for="Check4">Where benefit ceases due to failure to attend an assessment or medical</label>
                    </p>


                </div>
            </div>
            <div v-if="stat1 || stat2 || stat3 || stat4" class="alert alert-danger" role="alert">
                <p>Consider if referral can be made, other skip referral.</p>
                <a href="{{ route('stepa.show') }}" class="btn btn-primary">
                    Skip referral <i class="fa fa-btn fa-arrow-circle-right"></i>
                </a>
            </div>

            <span class="pull-right">
                <a href="{{ route('stepc.show') }}" class="btn btn-primary">
                    Next <i class="fa fa-btn fa-arrow-circle-right"></i>
                </a>
            </span>

            <span class="pull-left">
                <a href="{{ route('stepa.show') }}" class="btn btn-primary">
                  <i class="fa fa-btn fa-arrow-circle-left"></i>Back 
                </a>
            </span>






        </div>

    </div>

</div>

</div>

<script>


        var app = new Vue({
            el: '#app',
            data: {
                stat1: false,
                stat2: false,
                stat3: false,
                stat4: false,
            }
        })




    </script>

@endsection
