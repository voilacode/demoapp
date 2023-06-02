<!doctype html>
<html class="h-full bg-white">

<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="h-full">
    <div class=" min-h-full  justify-center px-6 py-12 lg:px-8 bg-gray-200">
        <div class="mb-5">
            <a href="{{ route('auth.profile')}}" class="text-blue-500 pr-5 ">Profile</a>
            <a href="{{ route('bill.index')}}" class="text-blue-500 pr-5 ">Bill Application</a>
            <a href="{{ route('auth.logout')}}" class="text-blue-500 pr-5 ">Logout</a>
        </div>

        <div class="p-5 rounded bg-white">
            @yield('content')
        </div>
    </div>
</body>

</html>