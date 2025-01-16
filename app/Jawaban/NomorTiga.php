<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {
	public function getData () {
		$data = Event::where('user_id', Auth::id())->get();
		
		return $data;
	}
	
	public function getSelectedData (Request $request) {
		$request->validate([
			'id' => 'required|exists:events,id',
		]);
		$data = Event::where('user_id', Auth::id())
			->where('id', $request->id)
			->first();

	 	return response()->json($data);
	}

	public function update (Request $request) {
		$request->validate([
			'id' => 'required|exists:events,id',
			'event_name' => 'required|string|max:255',
			'start_date' => 'required|date',
			'end_date' => 'required|date',
		]);
	
		$event = Event::where('user_id', Auth::id())
			->where('id', $request->id)
			->first();
	
		if ($event) {
			$event->update([
				'name' => $request->event_name,
				'start' => $request->start_date,
				'end' => $request->end_date,
			]);
		}
		
		return redirect()->route('event.home');
	}

	 public function delete (Request $request) {
		$request->validate([
			'id' => 'required|exists:events,id',
		]);
	
		$event = Event::where('user_id', Auth::id())
			->where('id', $request->id)
			->first();
	
		if ($event) {
			$event->delete();
		}
		
		return redirect()->route('event.home');
	}
}

?>