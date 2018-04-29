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
                <div class="panel-heading">
                    <h2>Option</h2>
                </div>

                <div class="panel-body">
                    <form action="{{ route('options.store', [$snap, $option]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <h4>Advice</h4>
                        <p>{{ $option->advice }}</p>
                        <h4>AIC and local outcome codes</h4>
                        <p>{{ $option->aic }}</p>
                        <h4>Advice Guide Ref and Link</h4>
                        <p>{{ $option->refs }}</p>
                        <h4>Referral Tag</h4>
                        <p>{{ $option->tags }}</p>
                        <p>
                            {{ Form::checkbox('client', old('client'), false) }}
                            <label for="client">Mark for inclusion in client Maximization list</label>
                        </p>
                        <p>
                            {{ Form::checkbox('worker', old('worker'), false) }}
                            <label for="worker">Mark for inclusion in list of identified maximization (for worker’s use)</label>
                        </p>

                        </button>
                        <button type="submit" class="btn btn-danger">Save
                        </button>
                    </form>

                    <a href="{{ route('admin.themes.show') }}" class="btn btn-default">Back</a>

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
