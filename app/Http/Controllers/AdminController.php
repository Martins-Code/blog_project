<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_Post(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->desc = $request->desc;

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120', // Max size in kilobytes (5 MB)
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move(public_path('postimage'), $imagename);

            $post->image = $imagename;
        }

        // Save the post to the database
        $post->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post added successfully!');
    }
}
