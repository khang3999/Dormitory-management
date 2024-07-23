<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Faker\Provider\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::all();
        return view('home', ['events' => $events]);
    }
    public function getAll()
    {
        //
        $events = Event::all();
        return view('admin.posts', ["posts" => $events]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        $event = new Event;
        $event->title = $validatedData['title'];
        $event->content = $validatedData['content'];

        if ($request->hasFile('img')) {
            $img = $request->file('img');

            // Tạo tên file mới bằng cách sử dụng hash
            $filename = time() . '_' . md5($img->getClientOriginalName()) . '.' . $img->getClientOriginalExtension();

            // Di chuyển file vào thư mục public/images/post với tên file mới
            $img->move(public_path('images/post/'), $filename);

            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $event->img = $filename;
        }

        $event->save();

        return response()->json(['message' => 'Thêm sự kiện thành công!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Event::findOrFail($id);
    
        // Validate input
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ảnh không bắt buộc, nhưng nếu có thì phải là hình ảnh hợp lệ
        ]);
    
        // Update post data
        $post->title = $request->title;
        $post->content = $request->content;
    
        // Xử lý ảnh nếu có
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            
            // Xóa ảnh cũ (nếu có)
            Storage::delete($post->img);
    
            // Lưu ảnh mới
            $imgPath = $request->file('img')->store('');
            $post->img = $imgPath;
            $img->move(public_path('images/post/'), $imgPath);
        }
    
        $post->save();
    
        return response()->json(['message' => 'Bài viết đã được cập nhật thành công!']);
    }
    


    public function destroy($id)
    {
        try {
            $post = Event::find($id); // Sửa thành đúng model của bạn, ví dụ Event
            if ($post) {
                // Xóa file ảnh nếu tồn tại
                if (file_exists(public_path($post->img))) {
                    unlink(public_path($post->img));
                }
                $post->delete();
                return response()->json(['message' => 'Bài viết đã được xóa thành công.']);
            }
            return response()->json(['message' => 'Bài viết không tồn tại.'], 404);
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa bài viết: ' . $e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra khi xóa bài viết.'], 500);
        }
    }
}
