@extends('layouts.app')

@section('content')

<x-alert> Hello Index </x-alert>

<h1>Bill Listing <a href="{{ route('bill.create') }}" class="btn btn-primary">Calculate the Bill</a></h1>

<div class="bg-white border p-3 my-3">
    Name: {{$user->name}} <bR>
    Role : {{$user->role}}

</div>
<table class="p-3 border w-full">
    <tr class="border-b border-2">
        <th>id</th>
        <th>number</th>
        <th>units</th>
        <th>amount</th>
        <th>due date</th>
        <th>User</th>
        <th>tools</th>
    </tr>
    @foreach($records as $data)
    <tr class="border-b border-2">
        <td>{{ $data->id }}</td>
        <td>{{ $data->number }}</td>
        <td>{{ $data->units }}</td>
        <td>{{ $data->amount }}</td>
        <td>{{ $data->amount }}</td>
        <td>{{ Auth::user()->where('id',$data->user_id)->first()->name }}</td>
        <td class="inline-flex space-x-2">
            <a href="{{ route('bill.show',$data->id) }}" class="bg-blue-500 px-3 rounded-lg text-white">Show </a>

            @can('update',$data)
            <a href="{{ route('bill.edit',$data->id) }}" class="bg-gray-500 px-3 rounded-lg text-white">Edit </a>
            @endcan

            @if($user->role=='admin')
            <form action="{{ route('bill.destroy',$data->id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button class="bg-red-500 px-3 rounded-lg text-white" type="submit">delete</button>
            </form>
            @endif


        </td>
    </tr>
    @endforeach
</table>
@endsection