@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('flash_message'))
        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Max options for: {{ $theme->title }}</h2></div>
                <h4>Scope:</h4>
                <p>{{ $theme->scope }}</p>
                <div class="panel-body">

                    @foreach ($theme->options as $key => $option)
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="heading{{ $key }}">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                        {{ $option->title }}
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse{{ $key }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                                <div class="card-body">
                                    <h4>Advice</h4>
                                    <p>{{ $option->advice }}</p>
                                    <h4>AIC and local outcome codes</h4>
                                    <p>{{ $option->aic }}</p>
                                    <h4>Advice Guide Ref and Link</h4>
                                    <p>{{ $option->refs }}</p>
                                    <h4>Referral Tag</h4>
                                    <p>{{ $option->tags }}</p>
                                    <p>
                                        <input type="checkbox" id="exampleCheck1">
                                        <label for="exampleCheck1">Mark for inclusion in client Maximization list</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="exampleCheck2">
                                        <label for="exampleCheck2">Mark for inclusion in list of identified maximization (for worker’s use)</label>
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    <span class="pull-left">
                        <a href="{{ route('themes.show') }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-arrow-circle-left"></i>Back
                        </a>
                    </span>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
