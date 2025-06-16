<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function showLogin()
    {
        return view('layout.login');
    }
    public function customer()
    {
        return view('layout.customer');
    }
    public function sidebar()
    {

        return view('layout.sidebarnew');
    }
    public function main()
    {
        return view('layout.main');
    }
    public function create_customer()
    {
        return view('layout.createcustomer');
    }

    public function login(Request $request)
    {
        // dd(session()->all());

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'vicky1243' && $password === '637431') {
            // echo'3';exit;

            session(['user' => $username]);
            return redirect('dashboard');
        } else {


            return redirect()->route('login')->with('error', 'Invalid credentials!');
        }
    }

    public function dashboard()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        return view('layout.dashboard');
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }

    public function mailing()
    {

        return view('layout.mailing');
    }
    public function appointment()
    {

        return view('layout.appointment');
    }
    public function sidesbar()
    {

        return view('layout.sidesbar');
    }
    // public function sidebarnew()
    // {

    //     return view('layout.sidebarnew');
    // }

    public function appointmentcreate()
    {

        return view('layout.appointmentcreate');
    }
    public function  appointment_history()
    {
        return view('layout.appointment_history');
    }
    public function appointment_schedule()
    {

        return view('layout.appointment_schedule');
    }
    public function pending()
    {

        return view('layout.pending');
    }
    public function mailers()
    {

        return view('layout.mailers');
    }
    public function mailing_list()
    {

        return view('layout.mailing_list');
    }
    public function monthly()
    {

        return view('layout.monthly');
    }
    public function email_send()
    {

        return view('layout.email_send');
    }
    public function today_activity()
    {

        return view('layout.today_activity');

    }
    public function Inventory()
    {

        return view('layout.Inventory');

    }
    public function issues()
    {

        return view('layout.issues');

    }
    public function invoice()
    {

        return view('layout.invoice');

    }
    public function allinvoice()
    {

        return view('layout.allinvoice');

    }
}



