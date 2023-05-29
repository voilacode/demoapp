<!doctype html>
<html class="h-full bg-white">

<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="h-full">

    <div class="min-h-full">


        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Hello {{$user->name}}!
                </h1>
                <p>Email: {{$user->email}}</p>
                <p>Role: {{$user->role}}</p>
                <a href="{{ route('auth.logout') }}" class="text-blue-300">Logout</a>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
            </div>
        </main>
    </div>
</body>


</html>