<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController
{
    public function index()
    {
        return view('profile.index', [
            'users' => User::query()
            ->first()
            ->get()
        ]);
    }

//    public function index()
//    {
//        return view('profile', [
//            'users' => User::query()
//                ->where("id", "=", 1)
//                ->get(),
//        ]);
//    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $user->name = request('name');
        $user->email = request('email');
        $user->birthday = request('birthday');
        $user->password = request('password');

        $user->save();

        return redirect('/profile')->with('success', 'Profile Update!');
    }

    public function createChangePassword(User $user)
    {
        return view('profile.change-password', [
            'user' => $user
        ]);
    }


    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendPasswordLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

}
