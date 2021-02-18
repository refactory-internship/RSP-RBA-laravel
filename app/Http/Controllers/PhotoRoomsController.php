<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRooms\Store;
use App\Models\PhotoRooms;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PhotoRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @return Response
     */
    public function store(Store $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param PhotoRooms $photoRooms
     * @return Response
     */
    public function show(PhotoRooms $photoRooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PhotoRooms $photoRooms
     * @return Builder|Builder[]|Collection|Model|Response
     */
    public function edit($id)
    {
        return PhotoRooms::query()->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $request
     * @param PhotoRooms $photoRooms
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Store $request, $id)
    {
        $photo = PhotoRooms::query()->find($id);
        $file = $request->file('photo');
        $roomID = 'ROOM_NO_' . $photo->room->id;
        $name = $roomID . '_' . uniqid();
        $cloudinary = $file->storeOnCloudinaryAs('public/rooms/' . $roomID . '/photos', $name);
        $photo->update([
           'photo' => $cloudinary->getSecurePath()
        ]);

        return redirect('/admin/rooms')->with('message', 'Photo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PhotoRooms $photoRooms
     * @return Response
     */
    public function destroy(PhotoRooms $photoRooms)
    {
        //
    }
}
