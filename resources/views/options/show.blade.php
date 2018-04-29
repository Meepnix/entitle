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
                    <div class="card">
                        <div class="card-header">
                            {{ $option->title }}
                        </div>
                        <div class="card-footer">
                            @if($snoption->find($option->id))


                            @else
                            <a href="{{ route('options.create', [$snap, $option]) }}" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus-square"></i>Open
                            </a>
                            @endif

                        </div>



                    </div>


                </div>
                    @endforeach

                </div>

                    <span class="pull-left">

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
