<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentScheduledController extends Controller
{
    public function index()
    {
        return view('appointments.schedule');
    }

    public function getAppointments(Request $request)
    {
        if ($request->ajax()) {
            $data = AppointmentScheduled::select('*');
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
}
