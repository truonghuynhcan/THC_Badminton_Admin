<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function deletePost(Request $request)
    {
        $p = News::find($request->id);
        if ($p) {
            $p->status = '0';
            $p->save();
            return redirect()->back()->with('success', 'Xóa bài viết thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy bài viết');
        }
    }
    public function updatePost_(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'category' => 'required|exists:news_cate,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        $p = News::findOrFail($id);
        $p->title = $request->input('title');
        $p->slug = $request->input('slug');
        $p->sub_title = $request->input('sub_title');
        $p->id_cate = $request->input('category');
        $p->content = $request->input('content');

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $p->img = $imagePath;
        }

        $p->save();
        $c = NewsCate::findOrFail($request->input('category'));
        $c->count++;
        $c->save();

        return redirect()->back()->with('success', 'Cập nhật dữ liệu thành công');
    }
    public function updatePost($slug)
    {
        $p = News::where('slug',$slug)->first();
        $category = NewsCate::all();
        return view('post.update', compact('p', 'category'));
    }   
    public function addNewPost()
    {
        $category = NewsCate::all();
        return view('post.addNewPost', compact('category'));
    }
    public function addNewPost_insert(Request $request)
    {

        // Validate the request
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'slug' => 'nullable|string|max:255',
        //     'sub_title' => 'nullable|string|max:255',
        //     'id_cate' => 'required|exists:news_cate,id',
        //     'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'content' => 'required|string',
        // ]);

        // Handle the file upload
        $fileNameToStore = null;
        if ($request->hasFile('img')) {
            // Loại bỏ khoảng trắng từ tên tệp
            // Get file with extension
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            // Get just file name
            $fileNameWithoutSpaces = str_replace(' ', '', $fileNameWithExt);
            $filename = pathinfo($fileNameWithoutSpaces, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('img')->move('img/news', $fileNameToStore);
        }
        // Create a new news item
        // News::createNewsItem($request, $fileNameToStore);
        $news = new News();
        $news->title = $request->input('title');
        $news->slug = $request->input('slug') ? $request->input('slug') : Str::slug($request->input('title'));
        $news->sub_title = $request->input('sub_title');
        $news->id_cate = $request->input('id_cate');
        $news->img = $fileNameToStore;
        $news->content = $request->input('content');
        $news->id_user = $request->user()->id;
        $news->date = now();
        $news->view = 0;
        $news->thumb_up = 0;
        $news->heart = 0;
        $news->save();

        return redirect()->route('addNewPost')->with('success', 'News item created successfully');
    }
    public function allPost(Request $request)
    {
        $sort_by = $request->input('sort_by', 'date'); // Mặc định sắp xếp theo ngày
        $sort_order = $request->input('sort_order', 'asc'); // Mặc định là 'asc'

        // Truy vấn bài viết với điều kiện sắp xếp và phân trang
        $query = News::where('status', '1');

        if ($sort_by === 'date') {
            $query->orderBy('date', $sort_order);
        } elseif ($sort_by === 'user') {
            $query->orderBy(function ($q) {
                $q->select('name')
                  ->from('users')
                  ->whereColumn('users.id', 'news.id_user');
            }, $sort_order);
        }

        $listPost = $query->paginate('10');

        return view('post.allPost', compact('listPost'));
    }

    // public function allPost(){
    //     $listPost = News::where('status','1')->paginate('10');
    //     // $listPost = News::with(['user', 'category'])->get();

    //     return view('post.allPost', compact('listPost'));
    // }
}
