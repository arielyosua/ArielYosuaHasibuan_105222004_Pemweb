<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Event::create([
            'name' => $validatedData['event_name'],
            'start' => $validatedData['start_date'],
            'end' => $validatedData['end_date'],
            'user_id' => Auth::id(), 
        ]);


        return redirect()->route('event.home')->with('success', 'Jadwal berhasil ditambahkan!');
    }
}