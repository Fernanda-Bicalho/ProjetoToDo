<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {


        if ($request->date) {
            $filterDate = $request->date;
        }else {
            $filterDate = date('Y-m-d');
        }

        $carbonDate = Carbon::createFromDate($filterDate);

        $date_as_string= $carbonDate->translatedFormat('d \d\e M');
        $date_prev_button = $carbonDate->addDay(-1)->format('Y-m-d');
        $date_next_button = $carbonDate->addDay(2)->format('Y-m-d');
        $filterDate = date('Y-m-d');
        $tasks = Task::whereDate('due_date', $filterDate)->get()->take(6);
        $authUser = Auth::user();

        return view('home', ['tasks' => $tasks, 'authUser' => $authUser, 'date_as_string' => $date_as_string, 'date_prev_button' => $date_prev_button, 'date_next_button' => $date_next_button]);
    }
}
