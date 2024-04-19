<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Social;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    protected $user;
    protected $social;
    protected $works;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(auth()->check()) {
                $this->user = auth()->user()->load('social', 'works');
            } else {
                $this->user = User::with('social', 'works')->first();
            }
            return $next($request);
        });
    }

    public function home() {
        return view ('guest.home', ['user' => $this->user]);
    }

    public function about() {
        return view ('guest.about', ['user' => $this->user]);
    }

    public function indexWorks() {
        return view ('guest.works_index', ['user' => $this->user]);
    }

    public function showWorks($id) {
        $work = Work::findOrFail($id);
        return view ('guest.works_show', ['user' => $this->user, 'work' => $work]);
    }

    public function contact() {
        return view ('guest.contact', ['user' => $this->user]);
    }
}
