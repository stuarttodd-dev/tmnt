<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TMNT</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>

    <title>TMNT</title>

    @livewireStyles
</head>
<body>
    <div class="container-fluid text-center">
        <h1>Basic TMNT Game (in Dev)</h1>
    </div>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            @foreach ($turtles as $turtle)
                <livewire:turtle-container :turtle="$turtle" />
            @endforeach
        </div>
    </div>
    <div class="py-5 bg-dark">
        <livewire:turtle-events :eventLogs="$eventLogs" />
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
</body>
</html>
