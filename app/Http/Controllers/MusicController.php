<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function index()
    {
        $dir = storage_path('app/public/music');
        $files = is_dir($dir) ? array_diff(scandir($dir), ['.', '..']) : [];
        $files = collect($files)
            ->filter(fn($file) => str_ends_with($file, '.mp3'))
            ->map(fn($file) => [
                'name' => $file,
                'url' => asset('storage/music/' . $file),
            ]);

        return view('music.playlist', ['songs' => $files]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'music' => 'required|mimes:mp3,mpeg|max:10240', // max 10MB
        ]);

        // Pastikan folder music ada
        Storage::disk('public')->makeDirectory('music');

        $file = $request->file('music');
        $filename = $file->getClientOriginalName(); // gunakan nama asli tanpa tambahan waktu
        $file->storeAs('music', $filename, 'public');

        return back()->with('success', 'Musik berhasil diupload!');
    }
}
