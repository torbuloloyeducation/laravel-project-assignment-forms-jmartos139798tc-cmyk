<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');


// GET - Show the form + email list
Route::get('/formtest', function () {
    return view('formtest', [
        'emails' => collect(session()->get('emails', [])),
    ]);
});

// POST - Add new email (with validation, no duplicates, max 5)
Route::post('/formtest', function (Request $request) {
    $validated = $request->validate([
        'email' => 'required|email',
    ]);

    $email = strtolower(trim($validated['email']));
    $emails = session()->get('emails', []);

    if (count($emails) >= 5) {
        session()->flash('error', 'You can only add up to 5 emails maximum.');
        return redirect('/formtest');
    }

    if (in_array($email, $emails)) {
        session()->flash('error', 'This email has already been added!');
    } else {
        session()->push('emails', $email);
        session()->flash('success', 'Email added successfully!');
    }

    return redirect('/formtest');
});

// POST - Delete ONE email
Route::post('/delete-email', function (Request $request) {
    $emailToDelete = strtolower(trim($request->email));

    $emails = session()->get('emails', []);

    $emails = array_filter($emails, function($email) use ($emailToDelete) {
        return strtolower(trim($email)) !== $emailToDelete;
    });

    session()->put('emails', array_values($emails));

    session()->flash('success', 'Email deleted successfully!');

    return redirect('/formtest');
});

// GET - Delete ALL emails
// Delete ALL emails
Route::get('/delete-emails', function () {
    session()->forget('emails');
    session()->flash('success', 'All emails have been deleted.');
    return redirect('/formtest');
});
