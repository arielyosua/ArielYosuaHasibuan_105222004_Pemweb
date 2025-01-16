<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

	public function getJson() {
		$events = Event::with('user')->get();
	
		$data = $events->map(function ($event) {
			return [
				'id' => $event->id,
				'title' => $event->name . ' - ' . $event->user->name, 
				'start' => $event->start . 'T00:00:00',
				'end' => $event->end . 'T23:59:59', 
				'color' => $event->user_id == Auth::id() ? '#007bff' : 'red', 
			];
		});
	
		return response()->json($data);
	}	
}

?>	