<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomManagementController extends Controller
{
    
    public function index(Request $request)
    {

        $query = Room::query();

        if (request('key')) {
            $query->where('room_type', 'like', '%' . request('key') . '%');
        }


        $rooms = $query->with('capacity')->paginate(10)->withQueryString();
        return view('admin.rooms.index', compact('rooms'));
    }

    
    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {

        request()->validate([
            'room_type' => 'required',
            'bed_type' => 'required',
            'area' => 'required',
            'view' => 'required',
            'price_per_night' => 'required',
            'max_capacity' => 'required',
            'description' => 'nullable',
        ]);

        $data = [
            'room_type' => request('room_type'),
            'bed_type' => request('bed_type'),
            'area' => request('area'),
            'view' => request('view'),
            'price_per_night' => request('price_per_night'),
            'remaining_rooms' => (int)request('max_capacity'),
            'description' => request('description'),
        ];


        if ($request->hasFile('image')) {
            $data['file_anh'] = Storage::put('rooms', $request->file('image'));
        }

        $room = Room::query()->create($data);

        $room->capacity()->create([
            'max_capacity' => request('max_capacity'),
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Thêm phòng thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::query()->with('capacity')->findOrFail($id);

        return view('admin.rooms.show', compact('room'));
    }

    
    public function edit($id)
    {
        $room = Room::query()->with('capacity')->findOrFail($id);

        return view('admin.rooms.edit', compact('room'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'room_type' => 'required',
            'bed_type' => 'required',
            'area' => 'required',
            'view' => 'required',
            'price_per_night' => 'required',
            'max_capacity' => 'required',
            'description' => 'nullable',
        ]);

        $data = [
            'room_type' => request('room_type'),
            'bed_type' => request('bed_type'),
            'area' => request('area'),
            'view' => request('view'),
            'price_per_night' => request('price_per_night'),
            'description' => request('description'),
        ];


        if ($request->hasFile('image')) {
            $data['file_anh'] = Storage::put('rooms', $request->file('image'));
        }

        $room = Room::query()->findOrFail($id);

        $room->update($data);

        $room->capacity()->update([
            'max_capacity' => request('max_capacity'),
        ]);
        return redirect()->route('admin.rooms.index')->with('success', 'Cập nhật phòng thành công!');

    }


    public function destroy($id)
    {
        DB::table('capacity')->where('room_id', $id)->delete();

        $room = Room::findOrFail($id);

        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Xóa phòng thành công!');

    }
}
