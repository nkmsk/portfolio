<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function top() {
        return view ('guest.top');
    }

    public function about() {
        return view ('guest.about');
    }

    public function works() {
        return view ('guest.works');
    }

    public function contact() {
        return view ('guest.contact');
    }
}
