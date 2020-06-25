<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirTicketController extends Controller
{
    public function airTicketHome(){
        return view('airTicket.airTicketHome');
    }

    public function searchAirTicket(){
        return view('airTicket.searchAirTicket');
    }
}
