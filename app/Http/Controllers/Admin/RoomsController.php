<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rooms\Store;
use App\Models\PhotoRooms;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    private $roomIndex;

    /**
     * RoomsController constructor.
     */
    public function __construct()
    {
        $this->roomIndex = '/admin/rooms';
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //
        $room = Room::query()->orderBy('id')->paginate(5);
        return view('admin.room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        //
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request)
    {
        $room = Room::query()->create($request->validated());
        $files = $request->file('photo');
        $roomID = 'ROOM_NO_' . $room->id;

        foreach ($files as $file) {
            $name = $roomID . '_' . uniqid();

            $cloudinary = $file->storeOnCloudinaryAs('public/rooms/' . $roomID . '/photos', $name);

            PhotoRooms::query()->create([
                'room_id' => $room->id,
                'photo' => $cloudinary->getSecurePath()
            ]);
        }

        return redirect($this->roomIndex)->with('message', 'Room added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Room $room
     * @return Application|Factory|View|Response
     */
    public function show(Room $room)
    {
        //
        $room_photos = $room->photos;
        return view('admin.room.show', compact('room', 'room_photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Room $room
     * @return Application|Factory|View|Response
     */
    public function edit(Room $room)
    {
        //
        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $request
     * @param Room $room
     * @return RedirectResponse
     */
    public function update(Store $request, Room $room)
    {
        //
        $room->update($request->validated());
        return redirect($this->roomIndex)->with('message', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $room
     * @return RedirectResponse
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return redirect($this->roomIndex)->with('danger', 'Room deleted successfully!');
    }
}
