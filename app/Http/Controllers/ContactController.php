<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display the contact messages for the admin
    public function index()
    {
        // Retrieve all contact messages from the database
        $messages = Contact::all();

        // Return the view with the messages
        return view('admin.contactMessages', compact('messages'));
    }

    // Store the contact message
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return back()->with('success', 'Your message has been sent!');
    }
}
