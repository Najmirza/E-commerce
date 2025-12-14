<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $data = $request->only(['first_name', 'last_name', 'email', 'message']);

        // Send Email
        Mail::to('najmirza7867@gmail.com')->send(new \App\Mail\ContactMessage($data));

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Thank you for your message! We will get back to you soon.']);
        }

        return back()->with('contact_success', 'Thank you for your message! We will get back to you soon.');
    }
}
