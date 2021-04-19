<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('trans_status', 'SUCCESS')->sum('trans_total');
        $sales = Transaction::count();
        $trans = Transaction::orderBy('id', 'DESC')->take(5)->get();

        $pie = [
            'pending' => Transaction::where('trans_status', 'PENDING')->count(),
            'failed' => Transaction::where('trans_status', 'FAILED')->count(),
            'success' => Transaction::where('trans_status', 'SUCCESS')->count()
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'trans' => $trans,
            'pie' => $pie
        ]);
    }
}
