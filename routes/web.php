<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// ============================================
// Existing Routes (unchanged)
// ============================================
Route::get('/', function () { return view('Pages.Home');})->name('Home');
Route::get('/Contact', function () { return view('Pages.Contact');})->name('Contact');
Route::get('/Login2', function () { return view('Pages.Login2');})->name('Login2');
Route::get('/Login', function () { return view('Pages.Login');})->name('Login');
Route::get('/Service', function () { return view('Pages.Service');})->name('Service');
Route::get('/Login1', function () { return view('Pages.Login1');})->name('Login1');
Route::get('/Hero', function () { return view('Component.Hero');})->name('Hero');
Route::get('/About', function () { return view('Pages.About');})->name('About');
Route::get('/2', function () { return view('Pages.2');})->name('2');
Route::get('/3', function () { return view('Pages.3');})->name('3');
Route::get('/register', function () {return view('Pages.register');})->name('register');


Route::post('/register', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'first_name' => 'required|string|max:100',
        'last_name'  => 'required|string|max:100',
        'email'      => 'required|email|unique:users,email',
        'company'    => 'required|string|max:150',
        'password'   => 'required|min:8|confirmed',
        'terms'      => 'accepted',
    ]);

    $user = \App\Models\User::create([
        'name'     => $data['first_name'] . ' ' . $data['last_name'],
        'email'    => $data['email'],
        'company'  => $data['company'],
        'password' => bcrypt($data['password']),
    ]);

    auth()->login($user);
    return redirect('/')->with('success', 'Welcome to Apexbooks!');
})->name('register.post');