<?php

namespace App\Http\Controllers;

use App\Models\EmailToSend;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmailToSendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = EmailToSend::all();
        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email'         => ['required', 'email', 'string', 'lowercase', 'max:255', 'min:5', Rule::unique('email_to_sends', 'email')],
            'name'          => ['required', 'string', 'max:255', 'min:5'],
        ]);

        EmailToSend::create($data);

        return to_route('emails.index')->with('success', 'Email created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailToSend $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailToSend $email)
    {
        return view('emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailToSend $email)
    {
        $data = $request->validate([
            'email'         => ['required', 'email', 'string', 'lowercase', 'max:255', 'min:5', Rule::unique('email_to_sends', 'email')->ignore($email->id)],
            'name'          => ['required', 'string', 'max:255', 'min:5'],
        ]);

        $email->update($data);

        return to_route('emails.index')->with('success', 'Email updated successfully');
    }

    public function delete(Request $request, EmailToSend $email)
    {
        return view('emails.delete', compact('email'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailToSend $email)
    {
        $email->delete();

        return to_route('emails.index')->with('success', 'Email deleted successfully');
    }
}
