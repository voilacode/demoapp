<?php

namespace App\Http\Controllers\Electricity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Bill::get();
        $user = Auth::user();
        $bill = new Bill();
        // authorization
        $this->authorize('viewAny', $bill);
        return view('bill.index')->with('records', $records)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bill = new Bill();
        // authorization
        $this->authorize('create', $bill);
        return view('bill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $units = $request->get('units');

        //business logic
        if ($units < 200)
            $amount = "500";
        else if ($units > 200 && $units <= 500)
            $amount = "1000";
        else if ($units > 500)
            $amount = "2000";

        $bill = new Bill();
        $bill->number = rand(400, 1000);
        $bill->units = $units;
        $bill->amount = $amount;
        $bill->user_id = $request->user_id;
        $bill->due_date = '25-12-2024';
        $bill->save();

        return redirect()->route('bill.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bill::where('id', $id)->first();
        // authorization
        $this->authorize('view', $bill);
        return view('bill.show')->with('data', $bill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();

        $bill = Bill::where('id', $id)->first();
        // authorization
        $this->authorize('update', $bill);
        return view('bill.edit')->With('data', $bill);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bill = Bill::where('id', $id)->first();
        $units =  $request->get('units');

        //business logic
        if ($units < 200)
            $amount = "500";
        else if ($units > 200 && $units < 500)
            $amount = "1000";
        else if ($units > 500)
            $amount = "2000";

        $bill->units = $units;
        $bill->amount = $amount;
        $bill->save();

        return redirect()->route('bill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Bill::where('id', $id)->first();
        $bill->delete();

        return redirect()->route('bill.index');
    }
}
