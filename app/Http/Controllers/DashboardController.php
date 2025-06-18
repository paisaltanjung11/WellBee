<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BmiHistory;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bmiHistory = BmiHistory::where('user_id', $user->id)
            ->whereDate('created_at', '>=', now()->subDays(30))
            ->orderBy('created_at', 'asc')
            ->get(['created_at', 'bmi'])
            ->map(function ($item) {
                return [
                    'date' => $item->created_at->format('Y-m-d'),
                    'bmi' => $item->bmi,
                ];
            });

        return view('dashboard', compact('user', 'bmiHistory'));
    }
}
