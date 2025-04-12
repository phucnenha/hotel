<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index( Request $request )
    {
        $bookingCount = Booking::query()->count();

        $customerCount = DB::table('customer')->count();

        $roomCount = Room::query()->count();

        $from = $request->input('from_date') ?? now()->startOfYear()->toDateString();
        $to = $request->input('to_date') ?? now()->endOfYear()->toDateString();

        $payments = DB::table('payment')
            ->whereBetween('payment_date', [$from, $to])
            ->select(
                DB::raw('MONTH(payment_date) as month'),
                DB::raw('SUM(total_amount) as total')
            )
            ->groupBy(DB::raw('MONTH(payment_date)'))
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        for ($m = 1; $m <= 12; $m++) {
            $labels[] = "Tháng $m";
            $found = $payments->firstWhere('month', $m);
            $data[] = $found ? $found->total : 0;
        }

        return view('admin.dashboard', compact('bookingCount', 'customerCount', 'roomCount', 'labels' , 'data', 'from', 'to'));
    }
}
