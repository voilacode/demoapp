@include('layouts.head')
<div class="border border-secondary p-4">
    <h1> Update the item</h1>
    <form action="{{ route('bill.update',$data->id) }}" method="post">
        <label>Your Bill Number is:</label>
        <input type="text" name="number" value="{{ $data->number }}" class="form-control w-100 mb-4" disabled />

        <label>Enter Units:</label>
        <input type="text" name="units" value="{{ $data->units }}" class="form-control w-100 mb-4" />

        <label>Amount:</label>
        <input type="text" name="amount" value="{{ $data->amount }}" class="form-control w-100 mb-4" disabled />
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <button type="submit" class="btn btn-primary">Update the bill</button>
        <a href="{{ route('bill.index') }}"><button type="button" class="btn btn-danger">back to index</button></a>
    </form>
</div>
@include('layouts.footer')