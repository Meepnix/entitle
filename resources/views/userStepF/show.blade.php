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
            <h3>Review complexity and capability to consider action to be taken</h3>
            <br>
            <label for="Check1"><h4>Not Met</h4></label>
            <input type="checkbox" id="Check1" v-model="stat1">
            <template v-if="stat1">
            <a href="{{ route('printA.show', [$snap])}}" target="_blank" class="btn btn-secondary">
                Adviser Actions
            </a>
            <a href="{{ route('printC.show', [$snap])}}" target="_blank" class="btn btn-secondary">
                Client Actions
            </a>
            </template>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br>
            <label for="Search">Enter Client's post code</label>
            <input type="text" id="Search1" v-model="search">
            <div v-if="search !== ''" v-for="item in filteredItems" >
                <p>@{{item.postcode}}<p>
            </div>

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
</div>


<script>

    var app = new Vue({
        el: '#app',
        data: {
            stat1: false,
            search: '',
            items: [
                {postcode: 'DL1'},
                {postcode: 'DL1 5PT'},
                {postcode: 'DL1 5TS'},
                {postcode: 'TS1 5HD'},
                {postcode: 'DL1 5QD'}
            ]
        },

        computed: {
            filteredItems() {
                return this.items.filter(item => {
                    return item.postcode.toLowerCase().replace(/ /g, '').indexOf(this.search.toLowerCase().replace(/ /g, '')) > -1
                })
            }
        }
    })

</script>



@endsection
