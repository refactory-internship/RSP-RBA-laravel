<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class DeletedRoomsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $room = Room::onlyTrashed()->get();
        return view('admin.room.bin', compact('room'));
    }

    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function restore($id)
    {
        $room = Room::onlyTrashed()->find($id);
        $room->restore();
        return redirect('admin/room/deleted')->with('message', 'Room has been restored!');
    }

    public function delete($id)
    {
        $room = Room::onlyTrashed()->find($id);
        $room->forceDelete();
        return redirect('admin/room/deleted')->with('danger', 'Room has been deleted permanently!');
    }
}
