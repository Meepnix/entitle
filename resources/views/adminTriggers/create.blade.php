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
                    <h2>Filters</h2>
                </div>

                <div class="panel-body">


                    <h3>Create Trigger</h3>

                    <form method="POST" action="{{ route('admin.triggers.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="type1">Form</label>
                            <select name="type" id="type1">
                                <option value="CRF" {{ old('type') == 'CRF' ? 'selected' : '' }}>CRF</option>
                                <option value="YRBC" {{ old('type') == 'YRBC' ? 'selected' : '' }}>YRBC</option>
                            </select> <br>
                        </div>
                        <div class="form-group">
                            <label for="trigger1">Question</label>
                            <input type="text" class="form-control" id="trigger1" name="trigger" value="{{ old('trigger') }}"></input><br>
                        </div>

                        <button type="submit">Save</button>

                    </form>
                    <a href="{{ route('admin.triggers.show') }}" class="btn btn-default">Back</a>

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
