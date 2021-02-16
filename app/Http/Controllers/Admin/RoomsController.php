<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rooms\Store;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class RoomsController extends Controller
{
    public function _construct()
    {
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        //
        Room::create($request->validated());

        return redirect()->back()->with('message', 'Room added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Room $room
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
     * @param \App\Models\Room $room
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Store $request, Room $room)
    {
        //
        $room->update($request->validated());
        return redirect()->back()->with('message', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return redirect()->back()->with('danger', 'Room deleted successfully!');
    }
}
