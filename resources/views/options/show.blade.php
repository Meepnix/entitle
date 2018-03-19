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
                <div class="panel-heading"><h2>Max options</h2></div>
                <h2>Max options for{{ $theme->title }}</h2>
                <h2>Scope</h2>
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
                                    <h4></h4>
                                    <p>{{ $option->advice }}</p>
                                    <h4></h4>
                                    <p>{{ $option->aic }}</p>
                                    <h4></h4>
                                    <p>{{ $option->refs }}</p>
                                    <h4></h4>
                                    <p>{{ $option->tags }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
