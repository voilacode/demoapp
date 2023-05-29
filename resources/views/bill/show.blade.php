@include('layouts.head')

<div class="border bg-warning">
    <h1>The record is {{ $data->number}} </h1>
    <a href=" {{ route('bill.index') }}">back to index</a>
</div>

@include('layouts.footer')