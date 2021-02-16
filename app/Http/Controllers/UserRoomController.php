<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class UserRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //
        $room = Room::query()->orderBy('id')->paginate(5);
        return view('user.room.index', compact('room'));
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
        return view('user.room.show', compact('room'));
    }
}
