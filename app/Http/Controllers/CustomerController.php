<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index(Request $request)
{
    $customers = Customer::latest()->get();

    if ($request->header('HX-Request')) {
        return view('customers.partial', compact('customers'));
    }

    return view('customers.index', compact('customers'));
}


    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'contact'    => 'nullable|string|max:50',
            'email'      => 'nullable|email|max:255',
            'address'    => 'nullable|string|max:255',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    /**
     * Display the specified customer.
     */
    public function show(string $id)
    {
        $customer = Customer::with('receipts')->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    // (Other methods remain empty for now: edit, update, destroy)
}
