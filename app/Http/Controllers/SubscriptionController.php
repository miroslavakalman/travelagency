<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create(['email' => $request->email]);

        return redirect()->back()->with('success', 'Вы успешно подписались на рассылку!');
    }
}
