<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Supplier::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Supplier::view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Supplier::post();
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return Supplier::get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return Supplier::get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        return Supplier::put();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        return Supplier::delete();
    }
}
