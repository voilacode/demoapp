@include('layouts.head')

<h1>Bill Listing <a href="{{ route('bill.create') }}" class="btn btn-primary">Calculate the Bill</a></h1>

<div class="bg-white border p-3 my-3">
        Name: {{$user->name}} <bR>
        Role : {{$user->role}}

    </div>
<table class="table table-bordered table-dark">
    <tr>
        <th>id</th>
        <th>number</th>
        <th>units</th>
        <th>amount</th>
        <th>due date</th>
        <th>tools</th>
    </tr>
    @foreach($records as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->number }}</td>
        <td>{{ $data->units }}</td>
        <td>{{ $data->amount }}</td>
        <td>{{ $data->due_date }}</td>
        <td>
            <a href="{{ route('bill.show',$data->id) }}" class="btn btn-sm btn-primary">Show </a>

            @if($user->role=='admin' || $user->role=='moderator')
            <a href="{{ route('bill.edit',$data->id) }}" class="btn btn-sm btn-success">Edit </a>
            @endif
            
            @if($user->role=='admin')
            <form action="{{ route('bill.destroy',$data->id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-sm btn-danger" type="submit" >delete</button>
            </form>
            @endif
            

        </td>
    </tr>
    @endforeach
</table>


@include('layouts.footer')