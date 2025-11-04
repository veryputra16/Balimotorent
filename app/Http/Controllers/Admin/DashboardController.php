<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Hal_Admin(Request $request)
    {
        $selectedYear = $request->get('year', now()->year);

        // === Line Chart ===
        $monthlyData = Loan::selectRaw('MONTH(delivery_date) as month, COUNT(*) as total')
            ->whereYear('delivery_date', $selectedYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthlyChartData = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthlyChartData[] = $monthlyData[$m] ?? 0;
        }

        // === Bar Chart ===
        $yearlyData = Loan::selectRaw('YEAR(delivery_date) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year')
            ->toArray();

        $availableYears = Loan::selectRaw('YEAR(delivery_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        // === 🔥 Top 5 Motor yang paling sering disewa ===
        $topMotors = Loan::select('motor_id', DB::raw('COUNT(*) as total'))
            ->groupBy('motor_id')
            ->orderByDesc('total')
            ->take(5)
            ->with('motor')
            ->get();

        return view('admin.Dashboard', [
            'title' => 'Admin',
            'image1' => '/img/logo.png',
            'monthlyChartData' => $monthlyChartData,
            'yearlyData' => $yearlyData,
            'selectedYear' => $selectedYear,
            'availableYears' => $availableYears,
            'topMotors' => $topMotors
        ]);
    }
}
