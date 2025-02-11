<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function tokoName () {
        $data =
            DB::table('users')->orderBy('id', 'desc')
            ->paginate(10);
            $allData = User::all();
        return view('pages.dashboard',['data' => $data,'allData' => $allData]);
    }
}
            $data =
            DB::table('users')->orderBy('id', 'desc')
            ->paginate(10);
            $allData = User::all();
        return view('pages.dashboard',['data' => $data,'allData' => $allData]);
