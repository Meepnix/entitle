<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Entitle') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/sidebar2.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        @can('admin-access')

        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"></li>
                <li>
                    <a href="{{ route('admin.themes.show') }}">Admin Themes</a>
                </li>
                <li>
                    <a href="{{ route('admin.triggers.show') }}">Admin Filters</a>
                </li>

                <h6 class="text-white font-weight-bold">SnapShots</h6>
                <div class="container">
                    @foreach (Auth::user()->snaps as $snap)

                    <div class="row">
                        <div class="col-8">
                            <a class="h6 pull-left text-white" href="{{ route('themes.show', [$snap])}}">{{$snap->created_at}}</a>
                        </div>

                        <div class="col-4">
                            <form action="{{ route('snaps.delete', [$snap]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">x</button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
            </ul>
        </div>
        @endcan

        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                    @if (!Auth::guest())

                        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">
                            <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                        </a>
                    @endif

                    </div>
                    <div class="col">
                        <span class="pull-right">
                            @if (Auth::guest())

                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @else

                            <!-- Authentication Links -->
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ __('Logout') }}</a>
                                    <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf

                                    </form>
                                </div>
                            </div>
                            @endif

                        </span>
                    </div>
                </div>
                @yield('content')

            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(function() {
            // setTimeout() function will be fired after page is loaded
            // it will wait for 2 sec. and then will fire
            // $("#savedMessage").hide() function
            setTimeout(function() {
                $("#savedMessage").hide('blind', {}, 200)
            }, 2000);
        });
    </script>
</body>
</html>
