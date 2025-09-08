<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;




class AuthenticatedSessionController extends Controller
{
    public function create():View
    {
        return view('pages.auth.login');
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validation sonrası verileri al
    $validatedData = $request->validated();

    $credentials = Arr::only($validatedData, ['email', 'password']);

    if (Auth::attempt($credentials)) {
        // session helper kullanarak
        session()->regenerate();

        return redirect()->route('todos.index');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
    }
    public function destroy(Request $request): RedirectResponse
    {
        //Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
