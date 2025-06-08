<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BmiController extends Controller
{
  public function save(Request $request)
  {
    $request->validate([
      'weight' => 'required|numeric|min:30|max:300',
      'height' => 'required|numeric|min:100|max:250',
    ]);

    $user = Auth::user();

    // Hitung BMI
    $heightInMeters = $request->height / 100;
    $bmi = $request->weight / ($heightInMeters * $heightInMeters);

    // Save ke database
    $user->weight = $request->weight;
    $user->height = $request->height;
    $user->bmi = round($bmi, 1);
    $user->save();

    return redirect()->route('dashboard')->with('success', 'BMI updated successfully!');
  }
}