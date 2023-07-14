<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            @yield('title')
        </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset("/css/styles.css")}}">
        @yield('link')

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>

    <body>

                {{-- <div class="alert alert-success">

                    {{ session()->get('success') }}

                </div> --}}
  
        <header>
            <nav class="my-navbar">
                <a class="my-navbar-brand" href="/">ToDo App</a>
                <div class="my-navbar-control">
                    @if(Auth::check())
                    <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
                    ｜
                    <a href="{{ route('logout') }}" id="logout" class="my-navbar-item">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                    ｜
                    <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                    @endif
                </div>
            </nav>
        </header>

        <div class="container">

            @yield('content')

        </div>

    </body>
    @if(Auth::check())
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
    </script>
    @endif
    @yield('JS')

</html>