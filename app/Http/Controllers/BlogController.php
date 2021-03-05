<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(9);

        return view('dashboard.views.blog.user.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "blogStore";
        $button = "Save";

        return view('dashboard.views.blog.form', compact('url', 'button'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|unique:blogs|max:150',
            'content' => 'required'
        ]);

        $blog = new Blog();
        if ($validator == false) {
            return redirect()->back()
                            ->withError($validator)
                            ->withInput();
        } else {
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->content = $request->content;
            $blog->save();

            return redirect()->route('blogList')->with(['success' => 'Artikel disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::with(['comments', 'comments.child'])->where('slug', $slug)->first();

        return view('dashboard.views.blog.user.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('blogList')->with(['success' => 'Artikel dihapus']);
    }

    public function list()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(5);

        return view('dashboard.views.blog.list', compact('blogs'));
    }

    public function contentImage(Request $request)
    {
        // If there is data sent
        if ($request->hasFile('upload')) {
            // temporarily save the file in a variable
            $file = $request->file('upload');
            // get original name
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            // then generate a new filename, combination of file name and time
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();
            // save it into the uploads/images/blog folder
            $file->move(public_path('uploads/images/blog'), $fileName);

            // then we give the response to ckeditor
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('uploads/images/blog/' . $fileName);
            $msg = 'Image uploaded successfully';

            // by sending url file and message information
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            // set header
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function comment(Request $request)
    {
        //validation of data received
        $this->validate($request, [
            'username' => 'required',
            'comment' => 'required'
        ]);

        $comment = new Comment();

        $comment->blog_id = $request->id;
        //if the parent id is not empty, then keep the id, otherwise null
        $comment->parent_id = $request->parent_id != '' ? $request->parent_id:NULL;
        $comment->username = $request->username;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }
}
