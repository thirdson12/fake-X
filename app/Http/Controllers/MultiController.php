<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Photo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MultiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protect the entire controller with authentication
    }

    public function index(): View
{
    $photos = Photo::all(); // Fetch all photos from the database

    return view('multi', compact('photos')); // Pass the photos to the view
}





public function store(Request $request)
{
    $this->validate($request, [
        'filenames' => 'required',
        'filenames.*' => 'image'
    ]);
    $photo = new Photo();
    $files = [];
    if ($request->hasfile('filenames')) {
        foreach ($request->file('filenames') as $file) {
            $name = time() . rand(1, 50) . '.' . $file->extension();
            $file->move(public_path('files'), $name);

            Photo::insert([
                'filenames' => $name,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
        }
    }



    return back()->with('success', 'Images are successfully uploaded');
}
}



