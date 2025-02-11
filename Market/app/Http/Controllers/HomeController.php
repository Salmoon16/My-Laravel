<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function tokoName () {
        $data = User::all();
        return view('pages.dashboard', ['data' => $data,]);
    }
}
