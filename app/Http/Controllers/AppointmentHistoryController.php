<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentHistory;
use Yajra\DataTables\Facades\DataTables; // ✅ REQUIRED FOR DataTables

class AppointmentHistoryController extends Controller
{
    public function index()
    {
        return view('appointmenthistory.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'appointment_date' => 'required|date',
        ]);

        AppointmentHistory::create([
            'name' => $validated['name'],
            'contact_no' => $validated['contact_no'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'appointment_date' => $validated['appointment_date'],
            'status' => 'Scheduled' // optional if status is default
        ]);

        return response()->json(['message' => 'Appointment History Added Successfully']);
    }

    public function list()
    {
        return DataTables::of(AppointmentHistory::query())->make(true);
    }
}


