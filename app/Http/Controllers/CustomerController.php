<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::orderBy('nama', 'asc')->get();
        return view('backend.v_customer.index', [
            'judul' => 'Data Customer',
            'index' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_customer.create', [
            'judul' => 'Customer',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'hp' => 'required|min:10|max:13|unique:customer',
        ]);
        Customer::create($validatedData);
        return redirect()->route('backend.customer.index')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('backend.v_customer.edit', [
            'judul' => 'customer',
            'edit' => $customer
        ]);
    }
 
    /**
     * Update the specified resource in storage.
     */
     
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required|max:255',
            'hp' => 'required|min:10|max:13',
        ];
        $validatedData = $request->validate($rules);
        Customer::where('id', $id)->update($validatedData);
        return redirect()->route('backend.customer.index')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Customer::findOrFail($id);
        $user->delete();
        return redirect()->route('backend.customer.index')->with('success', 'Data berhasil dihapus');
    }
}
