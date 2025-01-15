<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User; 

class NomorSatu {

	public function auth(Request $request) {
		$validated = $request->validate([
			'username_or_email' => 'required|string',
			'password' => 'required|string|min:6',
		]);
	
		$field = filter_var($validated['username_or_email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
	
		if (Auth::attempt([$field => $validated['username_or_email'], 'password' => $validated['password']])) {
			return redirect()->route('event.home');
		}
	
		return back()->withErrors([
			'username_or_email' => 'Username/Email atau password salah.',
		]);
	}	

    public function logout(Request $request) {
        // Proses logout
        Auth::logout();

        return redirect()->route('event.home');
    }
}
?>
