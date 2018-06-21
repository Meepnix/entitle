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
                <div class="panel-heading"><h1>Theme Images:</h1></div>
                <div class="panel-body">

                    <div class="card-columns">
                        @foreach ($images as $key => $image)

                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/' . $image) }}" alt="Card image cap">
                            <div class="card-body">
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteTheme{{ $key }}">
                                    <i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete
                                </a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteTheme{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you wish to continue and delete this image?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.images.delete') }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="image" value="{{ $image }}">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                            </button>
                                            <button type="submit" class="btn btn-danger">Yes
                                            </button>
                                        </form>
                                    </div>
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
