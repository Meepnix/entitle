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
                    <div style="margin-bottom: 1.5em;" class="card">
                        <div class="card-header">
                            {{ $option->title }}
                        </div>
                        <div class="card-footer">
                            {{-- If existing option saved edit instead of create. --}}
                            @if($snoption->find($option->id))
                            <a href="{{ route('options.edit', [$snap, $option]) }}" class="btn btn-primary">Open
                            </a>
                            @else
                            <a href="{{ route('options.create', [$snap, $option]) }}" class="btn btn-primary">Open
                            </a>
                            @endif

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

                    <span class="pull-left">
                        <a href="{{ route('themes.show', [$snap]) }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-arrow-circle-left"></i>Back
                        </a>
                    </span>

            </div>
        </div>
    </div>
</div>
@endsection
