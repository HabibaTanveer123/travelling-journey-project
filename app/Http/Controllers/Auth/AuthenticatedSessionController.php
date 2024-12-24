<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login'); // Ensure this view file exists.
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user.
        $request->authenticate();

        // Regenerate session to prevent session fixation.
        $request->session()->regenerate();

        // Explicitly redirect to the homepage after login
        return redirect('/');
    }
    public function authenticated(Request $request, $user)
{
    dd('Authenticated!', $user); // This will show if the method is being reached

    return redirect('/');
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Log the user out.
        Auth::guard('web')->logout();

        // Invalidate the session.
        $request->session()->invalidate();

        // Regenerate the CSRF token.
        $request->session()->regenerateToken();

        // Redirect to the homepage after logout.
        return redirect('/');
    }
}
