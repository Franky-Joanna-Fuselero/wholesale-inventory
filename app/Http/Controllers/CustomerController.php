<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     * 
     */



public function download()
{
    
    $customers = Customer::all();

    $pdf = Pdf::loadView('customers.export-pdf', compact('customers'));
    return $pdf->download('customer-list.pdf');
}

public function index(Request $request)
{
    $customers = Customer::all();

    if ($request->header('HX-Request')) {
        // HTMX request → return only content
        return view('customers.partial', compact('customers'));
    }

    // Normal page request
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
