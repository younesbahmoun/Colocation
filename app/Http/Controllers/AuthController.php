<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            // $token = $user->createToken('auth_token')->plainTextToken;

            return redirect()->route('home')->with('success', 'User logged in successfully');
        }

        return back()->withErrors([
            'login' => 'Email ou mot de passe incorrect'
        ])->onlyInput('email', 'password');
    }

    public function logout(Request $request)
    {
        // $request->session()->invalidate();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show')->with('success', 'Logged out successfully');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|min:3',
            'password' => 'required|string|min:3|confirmed',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'role' => 'user',
        ]);
        Auth::login($user);
        // $token = $user->createToken('auth_token')->plainTextToken;

        return redirect()->route('home')->with('success', 'User created successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
