@extends('layouts.app')
@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        Hello {{$user->name}}!
    </h1>
    <p>Email: {{$user->email}}</p>
    <p>Role: {{$user->role}}</p>
    <a href="{{ route('auth.logout') }}" class="text-blue-300">Logout</a>

    <a href="{{ route('bill.index') }}" class="text-indigo-500 pl-5">Bill Application</a>
</div>
@endsection