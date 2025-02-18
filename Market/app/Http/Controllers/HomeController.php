<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PrayerService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{

    protected $prayerTimeService;
    protected $prayerTime;
    protected $timeNow;

    public function __construct(PrayerService $prayerTimeService) {
        $this->prayerTimeService = $prayerTimeService;
        $this->timeNow = date('Y-m-d ');
    }
    public function tokoName () {
        $data =
            DB::table('users')->orderBy('id', 'desc')
            ->paginate(10);
            $allData = User::all();

            $cityId = $this->prayerTimeService->getCityId('Bantul');
            if (!$cityId) {
                return response()->json(['error' => 'City not found'], 404);
            }

            $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, $this->timeNow);

            Log::info($prayerTimes);
        return view('pages.dashboard',compact('data','allData', 'prayerTimes' ));
    }
}
