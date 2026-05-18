<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalFeedback = Feedback::count();
        $latestFeedback = Feedback::latest()->take(5)->get();
        $allFeedback = Feedback::latest()->get();

        $averages = Feedback::query()
            ->selectRaw('
                AVG(safety_rating) as safety,
                AVG(workstation_rating) as workstation,
                AVG(equipment_rating) as equipment,
                AVG(overall_satisfaction) as satisfaction
            ')
            ->first();

        $recommendations = Feedback::query()
            ->select('recommend_position', DB::raw('COUNT(*) as total'))
            ->groupBy('recommend_position')
            ->pluck('total', 'recommend_position');

        $departmentLeaders = Feedback::query()
            ->select('department', DB::raw('COUNT(*) as total'), DB::raw('AVG(overall_satisfaction) as average_rating'))
            ->groupBy('department')
            ->orderByDesc('total')
            ->take(4)
            ->get();

        $needsAttention = Feedback::query()
            ->where('overall_satisfaction', '<=', 2)
            ->orWhere('safety_rating', '<=', 2)
            ->latest()
            ->take(4)
            ->get();

        return view('dashboard', [
            'totalFeedback' => $totalFeedback,
            'latestFeedback' => $latestFeedback,
            'allFeedback' => $allFeedback,
            'averages' => $averages,
            'recommendations' => $recommendations,
            'departmentLeaders' => $departmentLeaders,
            'needsAttention' => $needsAttention,
        ]);
    }
}
