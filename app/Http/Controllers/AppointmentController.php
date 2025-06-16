<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required'
        ]);

        Appointment::create([
            'customer_name' => $request->customer_name,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'address' => $request->address,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'request_date' => now(), // Automatically set current date
        ]);

        return redirect()->back()->with('success', 'Appointment saved successfully.');
    }

    public function list()
    {
        $appointments = Appointment::all();
        return response()->json(['data' => $appointments]);
    }

    public function index()
    {
        $appointments = Appointment::all(); // Fetch all records from the database
        return view('invoice.issues', compact('appointments'));
    }
}
