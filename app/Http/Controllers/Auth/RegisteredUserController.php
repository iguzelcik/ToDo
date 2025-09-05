<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
class RegisteredUserController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('pages.auth.register');
    }
    public function store(RegisterRequest $request):RedirectResponse
    {

      
    $validatedData = $request->validated();

        // Create the user
$user = User::create([
            'name' => $validatedData['name'],
            'email' =>$validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        Auth::login($user);

        // Redirect to home or intended page after registration
        return redirect()->route('todos.index');
    }
   
}

