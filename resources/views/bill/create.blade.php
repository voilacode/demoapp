@include('layouts.head')
<div class="border border-secondary p-4">
    <h1> Enter the electricity usage units</h1>
    <form action="{{ route('bill.store') }}" method="post">
        <label>Enter Units:</label>
        <input type="text" name="units" value="" class="form-control w-100 mb-4" />
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

        @csrf
        <button type="submit" class="btn btn-primary">Calculate the bill</button>
        <a href="{{ route('bill.index') }}"><button type="button" class="btn btn-danger">back to index</button></a>
    </form>
</div>
@include('layouts.footer')