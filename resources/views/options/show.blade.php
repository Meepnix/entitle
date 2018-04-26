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
                        <div class="card-header"
                            {{ $option->title }}
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="POST">
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
                                                <input type="checkbox" id="exampleCheck2">
                                                <label for="exampleCheck1">Mark for inclusion in client Maximization list</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" id="exampleCheck2">
                                                <label for="exampleCheck2">Mark for inclusion in list of identified maximization (for worker’s use)</label>
                                            </p>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit" class="btn btn-danger">Save
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
