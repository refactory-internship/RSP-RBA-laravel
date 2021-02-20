<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = Auth::user();
        $finishedBooking = Booking::query()->where('user_id', $user->id)
            ->where('isCheckedIn', true)
            ->get();
        $cancelledBooking = Booking::onlyTrashed()->where('user_id', $user->id)->get();
        return view('user.profile.show', compact('user', 'finishedBooking', 'cancelledBooking'));
    }

    /**
     * @return Application|Factory|View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $user = User::query()->find(Auth::user()->id);
        $user->update([
            'email' => $request->email,
        ]);

        return redirect('/profile')->with('message', 'Your profile has been updated!');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function updatePhoto(Request $request)
    {
        //find the user
        $user = User::query()->find(Auth::user()->id);
        //file requested
        $file = $request->file('photo');
        //set filename and directory path
        $username = strtoupper('USER_' . strstr($user->email, '@', true));
        $filename = $username . '_' . uniqid();
        //check if the photo is default
        //delete photo using its public id from cloudinary
        if ($user->cld_public_id) {
            Cloudinary::destroy($user->cld_public_id);
        }
        //upload photo to cloudinary
        $cloudinary = $file->storeOnCloudinaryAs('public/users/' . $username . '/photos', $filename);
        //update user photo with data fetched from the uploader
        $user->update([
            'photo' => $cloudinary->getSecurePath(),
            'cld_public_id' => $cloudinary->getPublicId()
        ]);

        return redirect('/profile')->with('message', 'Your profile picture has been updated!');

    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function deletePhoto()
    {
        $user = User::query()->find(Auth::user()->id);
        //if the user delete their photo, replace it with a placeholder
        $user->update([
            'photo' => 'https://res.cloudinary.com/ffajarpratama/image/upload/v1613741541/public/placeholder/placeholder_rvdkjg.jpg',
            'cld_public_id' => ''
        ]);

        return redirect('/profile')->with('danger', 'Your profile picture has been deleted!');
    }
}
