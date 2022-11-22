<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ @asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ @asset('css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>

        @include('includes.app.navbar')
        @include('includes.app.aside')
