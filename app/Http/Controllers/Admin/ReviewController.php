<?php

namespace App\Http\Controllers\Admin;
use App\Models\Tour;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@poehali.com') {
            $reviews = Review::with('tour')->get();
            return view('admin.reviews.index', compact('reviews'));
        }

        return redirect('/')->with('error', 'У вас нет доступа к этой странице.');
    }

    public function create()
    {
        $tours = Tour::all(); // Для выбора тура
        return view('admin.reviews.create', compact('tours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'user_name' => 'required|string|max:255',
            'tour_id' => 'required|exists:tours,id',
        ]);

        Review::create($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Отзыв успешно создан.');
    }

    public function edit(Review $review)
    {
        $tours = Tour::all(); // Для выбора тура
        return view('admin.reviews.edit', compact('review', 'tours'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'text' => 'required|string',
            'user_name' => 'required|string|max:255',
            'tour_id' => 'required|exists:tours,id',
        ]);

        $review->update($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Отзыв успешно обновлён.');
    }

    public function destroy(Review $review)
{
    $review->delete();
    return redirect()->route('admin.reviews.index')->with('success', 'Отзыв успешно удалён.');
}

}
