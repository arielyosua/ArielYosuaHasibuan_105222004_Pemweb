<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {
    public function submit(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $event_name = $request->input('event_name');
		$start_date = $request->input('start_date');
		$end_date = $request->input('end_date');

        Event::create([
            'user_id' => Auth::id(),
            'name' => $event_name,
            'start' => $start_date,
            'end' => $end_date,
             
        ]);

        return redirect()->route('event.home')->with('success', 'Jadwal berhasil ditambahkan!');
    }
}