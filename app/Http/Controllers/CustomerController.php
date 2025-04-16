<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    //frotend Auth
     // Redirect ke Google 
     public function redirect() 
     { 
         return Socialite::driver('google')->redirect(); 
     }

     public function callback() 
     {
         try {
            $socialUser = Socialite::driver('google')->user(); 

            // Cek apakah email sudah terdaftar 
            $registeredUser = User::where('email', $socialUser->email)->first(); 

            if (!$registeredUser) { 
                // Buat user baru 
                $user = User::create([ 
                    'nama' => $socialUser->name, 
                    'email' => $socialUser->email, 
                    'role' => '2', // Role customer 
                    'status' => 1, // Status aktif 
                    'password' => Hash::make('default_password'), // Password default (opsional) 
                ]); 

                // Buat data customer 
                Customer::create([ 
                    'user_id' => $user->id, 
                    'google_id' => $socialUser->id, 
                    'google_token' => $socialUser->token 
                ]); 
 
                // Login pengguna baru 
                Auth::login($user); 
            } else { 
                // Jika email sudah terdaftar, langsung login 
                Auth::login($registeredUser); 
            } 

            // Redirect ke halaman utama 
            return redirect()->intended('beranda');
         }
         catch (\Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan saat login dengan  Google.');
         }
     }
}
