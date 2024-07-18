<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


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
        return view('admin.posts',["posts"=> $events]);
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'img' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);
    
    //     $event = new Event;
    //     $event->title = $request->title;
    //     $event->img = $request->img;
    //     $event->content = $request->content;
    //     $event->save();
    
    //     return response()->json(['message' => 'Thêm sự kiện thành công!']);
    // }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);
    
        $event = new Event;
        $event->title = $request->title;
        $event->content = $request->content;
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/img');
            
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            
            $file->move($path, $filename);
            $event->img = "images/img/" . $filename;
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
    // public function update(Request $request, Event $post)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'img' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);
    
    //     $post->title = $request->title;
    //     $post->img = $request->img;
    //     $post->content = $request->content;
    //     $post->save();
    
    //     return response()->json(['message' => 'Bài viết đã được cập nhật thành công!']);
    // }
    public function update(Request $request, Event $post)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'content' => 'required|string',
            ]);
    
            $post->title = $request->title;
            $post->content = $request->content;
    
            if ($request->hasFile('img')) {
                // Get the file from the request
                $file = $request->file('img');
                // Create a unique filename
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // Path to store the file
                $path = public_path('images/img');
                // Check and create directory if not exists
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0755, true, true);
                }
                // Move the file to the storage
                $file->move($path, $filename);
                // Save the filename to the database
                $post->img = "images/img/" . $filename;
            }
    
            $post->save();
    
            return response()->json(['message' => 'Bài viết đã được cập nhật thành công!']);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating post: ' . $e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    
    // public function destroy($id) {
    //     $post = Post::find($id);
    //     if ($post) {
    //         $post->delete();
    //         return response()->json(['message' => 'Bài viết đã được xóa thành công.']);
    //     }
    //     return response()->json(['message' => 'Bài viết không tồn tại.'], 404);
    // }
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
        \Log::error('Lỗi khi xóa bài viết: ' . $e->getMessage());
        return response()->json(['message' => 'Có lỗi xảy ra khi xóa bài viết.'], 500);
    }
}
}
