<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Hiển thị danh sách tài nguyên.
     */
    public function index()
    {
        // $rooms = Room::all();
        $rooms = Room::withCount('students')->get();
      
        return view('admin.rooms',["rooms"=> $rooms]);
          // return view('admin.rooms', compact('rooms'));
    }

    /**
     * Hiển thị form để tạo tài nguyên mới.
     */
    public function create()
    {
        //
    }

    /**
     * Lưu tài nguyên mới vào cơ sở dữ liệu.
     */
    public function store(StoreRoomRequest $request)
    {
        //
    }

    /**
     * Hiển thị tài nguyên cụ thể.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Hiển thị form để chỉnh sửa tài nguyên cụ thể.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Cập nhật tài nguyên cụ thể trong cơ sở dữ liệu.
     */
    public function updateRoom(Request $request)
    {
        try {
            $roomId = $request->input('room_id'); // Lấy id của phòng từ request
            $room = Room::find($roomId);
    
            if (!$room) {
                return response()->json(['status' => 'error', 'message' => 'Không tìm thấy phòng'], 404);
            }
    
            // Cập nhật thông tin phòng từ request
            $room->name = $request->input('room_name');
            $room->gender = $request->input('room_gender');
            $room->note = $request->input('room_note', ''); // Cập nhật note thành giá trị rỗng nếu trống
    
            // Lưu lại vào cơ sở dữ liệu
            $room->save();
    
            return response()->json(['status' => 'success', 'message' => 'Cập nhật phòng thành công']);
        } catch (\Exception $e) {
            // Log lỗi và trả về phản hồi lỗi
            Log::error('Error updating room: '.$e->getMessage().' at line '.$e->getLine());
            return response()->json(['status' => 'error', 'message' => 'Lỗi trong quá trình cập nhật phòng'], 500);
        }
    }
    /**
     * Xóa tài nguyên cụ thể khỏi cơ sở dữ liệu.
     */
    public function destroy(Room $room)
    {
        //
    }

    // Lấy danh sách sinh viên theo id phòng
    public function getStudents($id)
    {
        // Tìm phòng theo ID
        $room = Room::find($id);

        // Kiểm tra nếu phòng tồn tại
        if (!$room) {
            return response()->json(['message' => 'Không tìm thấy phòng'], 404);
        }

        // Lấy danh sách sinh viên
        $students = $room->students;

        // Trả về danh sách sinh viên
        return response()->json($students);
    }

    public function getAllRooms()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }
    public function layphongtrong(){
        $rooms = Room::withCount('students')
                ->having('students_count', '<', 15)
                ->get();
    
    return response()->json($rooms);
    }

    }