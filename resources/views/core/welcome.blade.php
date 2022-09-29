<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- Bootstrap --}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    {{-- DataTable --}}
    <script src="{{ asset('js/Jquery.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/DataTable.css') }}" />
    <script type="text/javascript" src="{{ asset('js/DataTable.js') }}"></script>

    {{-- Icon --}}
    {{-- <script src="{{ url('https://unpkg.com/feather-icons') }}"></script> --}}
    <script src="{{ asset('js/Icon.js') }}"></script>

    {{-- Font --}}


    <style>
        @font-face {
            font-family: "gulim";
            src: url("/font/meiryo.ttc");
        }

        body {
            font-family: "gulim";
        }


        .feather-16 {
            width: 20px;
            height: 20px;
        }

        .feather-24 {
            width: 24px;
            height: 24px;
        }

        .feather-32 {
            width: 32px;
            height: 32px;
        }
        
        body{

        }
    </style>


</head>

<body>
    <div style="background-color: #004225">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Kepegawaian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/detail">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/employee">Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category">Golongan</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-16" data-feather="user"></i> {{ auth()->user()->username }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right"></i> Log out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                            </li>


                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
    </div>
    <div>
        @yield('core-part')
    </div>

</body>
<script>
    feather.replace()
</script>

</html>
