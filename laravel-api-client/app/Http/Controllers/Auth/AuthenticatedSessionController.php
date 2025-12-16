<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; // ha Breeze-zel van
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    // Login form visszaadása (ha Breeze formot használsz)
    public function create()
    {
        return view('auth.login'); // vagy ahogy a projektben van
    }

    /**
     * Login: forward az API-hoz, session-be mentjük a tokent és user adatot.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $response = Http::api()->post('/users/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $body = $response->json();

            // Feltételezzük, hogy az API visszaad 'token' és 'user' mezőket
            $token = $body['token'] ?? ($body['user']['token'] ?? null);
            $user = $body['user'] ?? null;

            // Ha más formátumod van, igazítsd
            if (!$token || !$user) {
                return back()->withErrors(['email' => 'Nem várt válasz érkezett a szervertől.']);
            }

            session([
                'api_token' => $token,
                'user_name' => $user['name'] ?? null,
                'user_email' => $user['email'] ?? null,
            ]);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => $response->json('message') ?? 'Hibás bejelentkezési adatok.',
        ]);
    }

    /**
     * Logout: csak a session törlése (a backend token invalídálását opcionálisan meg lehet hívni).
     */
    public function destroy(Request $request): RedirectResponse
    {
        session()->forget('api_token');
        session()->forget('user_name');
        session()->forget('user_email');

        return redirect('/');
    }
}
