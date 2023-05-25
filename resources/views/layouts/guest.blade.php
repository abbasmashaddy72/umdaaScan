<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon" type="image/svg+xml">
    <title>
        @if (!empty($title))
            {{ $title . ' | ' }}{{ config('app.name', 'Laravel') }}
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @stack('styles')
</head>

<body class="login">

    <div class="container sm:px-10">
        <div class="block grid-cols-2 gap-4 xl:grid">
            <!-- BEGIN: Login Info -->
            <div class="flex-col hidden min-h-screen xl:flex">
                <x-logo class="items-center pt-5 -intro-x">
                    <span class="ml-3 text-lg text-white">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </x-logo>
                <div class="my-auto">
                    {{ $left }}
                </div>
            </div>
            <!-- END: Login Info -->
            <div class="flex h-screen py-5 my-10 xl:h-auto xl:py-0 xl:my-0">
                <div
                    class="w-full px-5 py-8 mx-auto my-auto bg-white rounded-md shadow-md xl:ml-20 dark:bg-darkmode-600 xl:bg-transparent sm:px-8 xl:p-0 xl:shadow-none sm:w-3/4 lg:w-2/4 xl:w-auto">
                    {{ $right }}
                </div>
            </div>
        </div>
    </div>

    @include('layouts.bePartials.dark-mode-switch')

    @stack('scripts')
</body>

</html>
