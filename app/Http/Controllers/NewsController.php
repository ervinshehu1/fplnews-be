<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json([
            [
                'id' => 1,
                'title' => 'FPL Deadline Extended',
                'content' => 'The deadline is now Saturday 12:30 PM.',
                'image' => 'https://via.placeholder.com/400x200.png?text=FPL+Deadline',
            ],
            [
                'id' => 2,
                'title' => 'Top Picks for GW5',
                'content' => 'Salah and Haaland are top picks this week.',
                'image' => 'https://via.placeholder.com/400x200.png?text=Top+Picks',
            ],
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        $news = News::create($validated);

        return response()->json($news, 201);
    }
}
