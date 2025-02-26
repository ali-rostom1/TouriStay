<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Landlord;
use App\Models\Tourist;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'user_type' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->user_type === "tourist"){
            $tourist = Tourist::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = User::find($tourist->id);
            $user->assignRole("tourist");
            event(new Registered($tourist));
            
            Auth::login($user);
        }else{
            $landlord = Landlord::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = User::find($landlord->id);
            $user->assignRole("landlord");
            event(new Registered($landlord));

            Auth::login($user);
        }

        

        return redirect(route('home', absolute: false));
    }
}
