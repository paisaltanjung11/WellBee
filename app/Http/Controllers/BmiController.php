<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BmiHistory; 

class BmiController extends Controller
{
  public function save(Request $request)
  {
    $request->validate([
      'weight' => 'required|numeric|min:20|max:500',
      'height' => 'required|numeric|min:50|max:300',
    ]);

    $user = Auth::user();

    if (!$user) {
      abort(403, 'Unauthorized action.');
    }

    $heightInMeters = $request->height / 100;
    $bmi = $request->weight / ($heightInMeters * $heightInMeters);
    $bmiRounded = round($bmi, 1);

    $user->weight = $request->weight;
    $user->height = $request->height;
    $user->bmi = $bmiRounded;
    $user->save();

    // test jgn cek existing
    // $today = now()->startOfDay();

    // $existingHistory = BmiHistory::where('user_id', $user->id)
    //   ->whereDate('created_at', $today)
    //   ->first();

    // if ($existingHistory) {
    //   // Update existing
    //   $existingHistory->bmi = $bmiRounded;
    //   $existingHistory->updated_at = now();
    //   $existingHistory->save();
    // } else {
    // Insert new
    BmiHistory::create([
      'user_id' => $user->id,
      'bmi' => $bmiRounded,
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    // }

    return redirect()->route('dashboard')->with('success', 'BMI updated successfully!');
  }
}
