<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRooms\Store;
use App\Models\PhotoRooms;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PhotoRoomsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param Store $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Store $request, $id)
    {
        //set filename and directory path
        $photo = PhotoRooms::query()->find($id);
        $file = $request->file('photo');
        $roomID = 'ROOM_NO_' . $photo->room->id;
        $name = $roomID . '_' . uniqid();
        //delete photo using its public id from cloudinary
        Cloudinary::destroy($photo->public_id);
        //upload photo to cloudinary
        $cloudinary = $file->storeOnCloudinaryAs('public/rooms/' . $roomID . '/photos', $name);
        //update chosen photo with data fetched from the uploader
        $photo->update([
            'secure_url' => $cloudinary->getSecurePath(),
            'public_id' => $cloudinary->getPublicId()
        ]);

        return redirect('/admin/rooms')->with('message', 'Photo updated successfully!');
    }
}
