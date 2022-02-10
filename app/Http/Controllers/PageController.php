<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function monthlyHours()
    {

        $hoursPerMonth = Task::where('user_id', Auth::id())
                ->groupBy('month')
                ->selectRaw("month, SUM(hours) as total_hours")
                ->orderBy('month')
                ->get();

        return view('monthly-hours')->with('data', $hoursPerMonth);
    }
}
