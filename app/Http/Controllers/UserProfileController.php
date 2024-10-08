<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
                if ($user->email === 'admin@poehali.com') {
            return redirect('/admin');
        }

        $bookings = Booking::where('user_id', $user->id)->with('tour')->get();

        return view('profile.index', compact('user', 'bookings'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->cancel();

        return redirect()->route('profile.index')->with('success', 'Бронирование успешно отменено.');
    }

    public function updateBooking(Request $request, $id)
    {
        $request->validate([
            'number_of_people' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->updateBooking($request->all());

        return redirect()->route('profile.index')->with('success', 'Бронирование успешно обновлено.');
    }
}
