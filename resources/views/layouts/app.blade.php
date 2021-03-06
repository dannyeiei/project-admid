<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    #navcolor-1 {
        background-color: #307689;
    }

    #navcolor {
        background-color: #f7c76a;
    }

    #navlink {
        color: #307689;
    }

    #navlink a:visited {
        color: #ffffff;
    }

    #box {
        border-radius: 60px;
        padding-right: 80px;
    }

    #box2 {
        position: abstract;
        border-radius: 25px;
    }
</style>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm navbar-dark sticky-top" id="navcolor-1">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                       เว็บแอปพลิเคชันแนะนำสถานที่ท่องเที่ยวในจังหวัดพัทลุง
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>

                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>

                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <body>
       
            
            <nav class="navbar navbar-expand-sm navbar-light" id="navcolor">
                <br>
                

                <div class="container-fluid">
                <div class="container">

                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a href="/member" class="nav-link">ข้อมูลสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a href="/placetype" class="nav-link">ประเภทสถานที่ท่องเที่ยว</a>
                        </li>
                        <li class="nav-item">
                            <a href="/event" class="nav-link">เทศกาล/วันสำคัญ</a>
                        </li>
                        <li class="nav-item">
                            <a href="/place" class="nav-link">สถานที่ท่องเที่ยว</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">การรีวิว</a>
                        </li>
                        <form action="" class="d-flex" id="right">
                            <input type="search" class="form-control mr-sm-2" placeholder="ข้อมูลสถานที่ท่องเที่ยว ..." aria-label="ค้นหา" id="box">
                            <button class="btn btn-light my-sm-0" type="submit" id="box2">ค้นหา

                            </button>
                        </form>
                    </ul>

                </div>


            </nav>
        </div>



        </body>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>

</html>