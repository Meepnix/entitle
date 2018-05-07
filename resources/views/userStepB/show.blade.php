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
                    <p>
                        <input type="checkbox" id="Check2" v-model="stat2">
                        <label for="Check2">Learning Disabilites</label>
                    </p>
                    <p>
                        <input type="checkbox" id="Check3" v-model="stat3">
                        <label for="Check3">Cognitive difficulties</label>
                    </p>
                    <p>
                        <input type="checkbox" id="Check4" v-model="stat4">
                        <label for="Check4">Evidence of problems pursing entitlement (e.g. history of failed claim, reading/writing problems) - agree with Session Supervisor before referral on this ground</label>
                    </p>
                </div>
                <div class="col">
                    <h3>COMPLEXITY</h3>
                    <p>Where the issue being presented concerns:</p>

                    <p>
                        <input type="checkbox" id="Check5" v-model="stat5">
                        <label for="Check5">Cohabitation cases</label>
                    </p>

                    <p>
                        <input type="checkbox" id="Check6" v-model="stat6">
                        <label for="Check6">Where benefit ceases due to failure to attend an assessment or medical</label>
                    </p>

                    <p>
                        <input type="checkbox" id="Check7" v-model="stat7">
                        <label for="Check7">Clients who present with sanctions problems</label>
                    </p>

                    <p>
                        <input type="checkbox" id="Check8" v-model="stat8">
                        <label for="Check8">Clients who present with sanctions problems</label>
                    </p>

                    <p>
                        <input type="checkbox" id="Check9" v-model="stat9">
                        <label for="Check9">Multiple linked benefits matters - agree with Session Supervisor before referral on this ground</label>
                    </p>

                    <p>
                        <input type="checkbox" id="Check10" v-model="stat10">
                        <label for="Check10">Overpayment cases should be referred to the debt team in the first instance</label>
                    </p>


                </div>
            </div>
            <div v-if="stat1 || stat2 || stat3 || stat4 || stat5 || stat6 || stat7 || stat8 || stat9 || stat10" class="alert alert-danger" role="alert">
                <p>Consider if referral can be made, otherwise skip referral step.</p>
                <a href="{{ route('stepd.show') }}" class="btn btn-primary">
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
                stat5: false,
                stat6: false,
                stat7: false,
                stat8: false,
                stat9: false,
                stat10: false,
            }
        })




    </script>

@endsection
