<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Carbon;
class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($roomId)
    {
        $histories = History::where('idphong', $roomId)->orderByDesc('ngayhu')->get();
        return response()->json($histories);
    }
    public function getAll()
    {
        // Lấy tất cả các bản ghi từ bảng histories
        $histories = History::all();
        
        // Trả về dữ liệu dưới dạng JSON
        return response()->json($histories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|integer',
            'history' => 'required|string',
        ]);
    
        $roomId = $request->input('room_id');
        $historyText = $request->input('history');
        // Thêm dữ liệu lịch sử vào cơ sở dữ liệu
        $history = new History(); // Thay đổi thành model lịch sử phù hợp
        $history->idphong = $roomId;
        $history->status = $historyText;
        $history->ngayhu = Carbon::now();
        $history->ngaysua = "";
        $history->type = "0";
        $history->save();
       
        return response()->json(['status' => 'success', 'message' => 'Thêm lịch sử thành công.']);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(History  $history)
    {
    
    return  json_encode($history);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function daSua(Request $request, string $id)
    {
        $history = History::find($id);
        
        if (!$history) {
            return response()->json(['message' => 'Không tìm thấy lịch sử với ID: ' . $id], 404);
        }
    
        $history->type = '1';
        $history->ngaysua = Carbon::now();
        $history->save();
        
        return response()->json(['message' => 'Cập nhật thành công!']);
    }
    
    public function getById(string $id)
{
   
}
}
