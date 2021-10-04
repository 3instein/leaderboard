<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'players' => Player::all(),
            'leaderboard' => Player::orderBy('poin', 'DESC')->take(3)->get(),
        ]);
    }
}
