<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TMNT</title>

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />

        @livewireStyles
        </style>
    </head>
    <body>
        <div class="articles-container space-y-6 my-8">
            @foreach ($turtles as $turtle)
                <livewire:show-turtle :turtle="$turtle"/>
            @endforeach
        </div>

        @livewireScripts
    </body>
</html>
