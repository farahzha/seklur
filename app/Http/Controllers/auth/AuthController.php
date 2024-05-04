<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view( 'welcome' );
    }

    public function authenticate( Request $request ): RedirectResponse
    {
        $request->validate( [ 
            'username'    => [ 'required' ],
            'password' => [ 'required', 'min:6', 'max:10' ],
        ] );

        if ( Auth::attempt( [ 'username' => $request->username, 'password' => $request->password] ) ) {
            $request->session()->regenerate();

            return redirect()->route('login')->with( [ 'success' => 'login berhasil' ] );
        }

        return back()->with( [ 'failed' => 'login gagal' ] );
    }

    public function logout( Request $request ): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( '/' );
    }
}
