<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User; 

class NomorSatu {

	public function auth(Request $request) {
		$request->validate([
		 	'username_or_email' => 'required',
		 	'password' => 'required',
		]);

		$identifier = $request->input('username_or_email');
		$password = $request->input('password');
	
		$field = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
	
		if (Auth::attempt([$field => $identifier, 'password' => $password])) {
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
