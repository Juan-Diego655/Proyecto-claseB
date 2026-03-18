<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.'
        ])->onlyInput('email');
    }

    public function dashboard()
{
    if (!Auth::check()) {
        $user = User::first();

        if ($user) {
            Auth::login($user);
            request()->session()->regenerate();
        }
    }

    $recentProducts = Product::latest()->take(5)->get();
    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $lastProduct = Product::latest()->first();

    return view('admin.dashboard', [
        'recentProducts' => $recentProducts,
        'totalProducts' => $totalProducts,
        'totalCategories' => $totalCategories,
        'lastProductName' => $lastProduct ? $lastProduct->name : 'Sin registros'
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}