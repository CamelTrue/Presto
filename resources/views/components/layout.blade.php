<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PRESTO</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>

    <x-navbar />
    <div class="bar-custom"></div>


    {{$slot}}


    <x-footer />

    {{-- JS --}}
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>