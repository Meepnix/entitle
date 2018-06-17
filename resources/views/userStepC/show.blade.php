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
            <h1><span class="badge badge-primary">Step C</span></h1>
            <h3>Where Capability OR Complexity criteria are met, can case be referred to Generalist Casework or Specialist workers?</h3>

            <div class="row">
                <div class="col">
                    <h3>Generalist Casework referrals</h3>
                    <p>can be made if issues raised include: (tick the box if they apply)</p>
                    <p>
                        <input type="checkbox" id="Check1" v-model="stat1" :disabled="stat2">
                        <label for="Check1">PIP2 forms, ESA 50 forms, Benefit Supersessions, Reconsiderations</label>
                    </p>
                </div>
                <div class="col">
                    <h3>Specialist Referrals</h3>
                    <p>can be made if issues raised include: (tick the box if they apply)</p>
                    <p>
                        <input type="checkbox" id="Check2" v-model="stat2" :disabled="stat1">
                        <label for="Check2">Appeals or post tribunal advice</label>
                    </p>
                </div>
            </div>
            <div v-if="stat1" class="alert alert-danger" role="alert">
                <p>Generalist referral tag</p>

            </div>

            <div v-if="stat2" class="alert alert-danger" role="alert">
                <p>Specialist referral tag</p>

            </div>



            <span v-if="stat1 || stat2">
            </span>
            <span v-else  class="pull-right">
                <a href="{{ route('stepd.show') }}" class="btn btn-primary">
                    Next <i class="fa fa-btn fa-arrow-circle-right"></i>
                </a>
            </span>

            <span class="pull-left">
                <a href="{{ route('stepb.show') }}" class="btn btn-primary">
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
        }
    })

</script>

@endsection
