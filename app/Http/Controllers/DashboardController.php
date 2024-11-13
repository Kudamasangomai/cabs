<?php

namespace App\Http\Controllers;

use App\Http\enum\AccountStatus;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalapplication = Account::whereMonth('created_at', $currentMonth)->count();
        $totalapplicationpending  = Account::where('status', AccountStatus::Pending->value)->whereMonth('created_at', $currentMonth)->count();
        $totalapplicationrejected = Account::where('status', AccountStatus::Rejected->value)->whereMonth('created_at', $currentMonth)->count();
        $totalapplicationapproved = Account::where('status', AccountStatus::Aprroved->value)->whereMonth('created_at', $currentMonth)->count();
        $rejectedapplication = Account::with('user')->where('status', AccountStatus::Rejected->value)->whereMonth('created_at', $currentMonth)->get();


        return view('dashboard',compact(
            'totalapplication',
            'totalapplicationpending',
            'totalapplicationrejected',
            'totalapplicationapproved',
            'rejectedapplication'

        ));
    }
}
