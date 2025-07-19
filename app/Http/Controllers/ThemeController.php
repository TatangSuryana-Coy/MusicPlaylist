<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('settings.theme', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:pink,blue,dark'
        ]);
        $user = Auth::user();
        $user->theme = $request->theme;
        $user->save();

        return redirect()->route('settings.theme')->with('success', 'Tema berhasil disimpan!');
    }
}