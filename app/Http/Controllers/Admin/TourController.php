<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Booking;
class TourController extends Controller
{
    public function adminIndex()
    {
        if (Auth::check() && Auth::user()->email === 'admin@poehali.com') {
            $tours = Tour::all();
            return view('admin.tours.index', compact('tours'));
        }

        return redirect('/')->with('error', 'У вас нет доступа к этой странице.');
    }

    public function index()
    {
        $tours = Tour::all();
        return view('tours.index', compact('tours'));
    }

    public function create()
    {
        return view('admin.tours.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'type' => 'required|string|max:255',
        'cost' => 'required|numeric',
        'duration' => 'required|integer',
        'continent' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'language' => 'required|string|max:255',
        'accommodation_type' => 'required|string|max:255',
        'image_path' => 'required|string|max:255',
        'max_people' => 'required|integer|min:1',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after:start_date',
    ]);

    $data = $request->all();

    if ($request->hasFile('image_path')) {
        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $imageName);
        $data['image_path'] = 'images/' . $imageName;
    }

    Tour::create($data);
    return redirect()->route('admin.tours.index')->with('success', 'Тур успешно создан.');
}

    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', compact('tour'));
    }    

    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000', 
            'type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'duration' => 'required|integer',
            'continent' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'accommodation_type' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'max_people' => 'required|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            if ($tour->image_path) {
                File::delete(public_path($tour->image_path));
            }
            
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $data['image_path'] = 'images/' . $imageName;
        }

        $tour->update($data);
        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно обновлён.');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно удалён.');
    }

    public function showAll(Request $request)
    {
        $query = Tour::query();

        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

      
     
        if ($request->filled('continent')) {
            $query->where('continent', 'like', '%' . $request->continent . '%');
        }

        
        if ($request->filled('language')) {
            $query->where('language', 'like', '%' . $request->language . '%');
        }

  
        if ($request->filled('accommodation_type')) {
            $query->where('accommodation_type', 'like', '%' . $request->accommodation_type . '%');
        }

        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'cost_asc':
                    $query->orderBy('cost', 'asc');
                    break;
                case 'cost_desc':
                    $query->orderBy('cost', 'desc');
                    break;
                case 'duration_asc':
                    $query->orderBy('duration', 'asc');
                    break;
                case 'duration_desc':
                    $query->orderBy('duration', 'desc');
                    break;
            }
        }
        $tours = $query->get();

    
        $types = Tour::distinct()->pluck('type');
        $costs = Tour::distinct()->pluck('cost');
        $durations = Tour::distinct()->pluck('duration');
        $continents = Tour::distinct()->pluck('continent');
        $languages = Tour::distinct()->pluck('language');
        $accommodationTypes = Tour::distinct()->pluck('accommodation_type');

        return view('tours.index', compact('tours', 'types', 'costs', 'durations', 'continents', 'languages', 'accommodationTypes'));
    }

    public function show(Tour $tour)
    {
        return view('tours.show', compact('tour'));
    }

    public function book(Request $request, Tour $tour)
    {
        $request->validate([
            'number_of_people' => 'required|integer|min:1|max:' . $tour->max_people,
            'start_date' => 'required|date',
        ]);
    
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'tour_id' => $tour->id,
            'number_of_people' => $request->number_of_people,
            'start_date' => $request->start_date,
        ]);
        
        if ($booking) {
            $tour->max_people -= $request->number_of_people;
            $tour->save();
        } else {
            return redirect()->back()->with('error', 'Ошибка при бронировании тура.');
        }
    
        return redirect()->route('tours.show', $tour)->with('success', 'Тур успешно забронирован!');
    }
    

    
    

public function storeReview(Request $request, Tour $tour)
{
    $request->validate([
        'text' => 'required|string|max:1000',
        'user_name' => 'required|string|max:255',
    ]);

    $tour->reviews()->create([
        'text' => $request->text,
        'user_name' => $request->user_name,
    ]);

    return redirect()->route('tours.show', $tour)->with('success', 'Отзыв успешно добавлен!');
}

}
