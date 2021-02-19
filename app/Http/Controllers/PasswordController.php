<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Update;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function edit()
    {
        $user = User::query()->find(Auth::user()->id);
        return view('user.profile.password.edit', compact('user'));
    }

    /**
     * @param Update $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Update $request)
    {
        $user = User::query()->find(Auth::user()->id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('/profile')->with('message', 'Your password has been changed!');
    }
}
