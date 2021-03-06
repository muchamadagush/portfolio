<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(8);

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "categoryStore";
        $button = "Save";

        return view('dashboard.category.form', compact('url', 'button'));
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
            'title' => 'required|unique:categories|max:50',
            'status' => 'required'
        ]);

        if ($validator == false) {
            return redirect()->back()
            ->withError($validator)
            ->withInput();
        } else {
            $category = new Category();
            $category->title = $request->title;
            $category->status = $request->status;
            $category->save();

            return redirect()->route('categoryIndex')->with(['success' => 'Kategori disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $url = "categoryUpdate";
        $button = "Save";

        $category = Category::find($category->id)->first();

        return view('dashboard.category.form', compact('url', 'button', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::find($request->id);

        $validator = $request->validate([
            'title' => 'required|max:50',
            'status' => 'required'
        ]);

        if ($validator == false) {
            return redirect()->back()
            ->withError($validator)
            ->withInput();
        } else {

            $category->title = $request->title;
            $category->status = $request->status;

            $category->update();

            return redirect()->route('categoryIndex');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();

        return redirect()->route('categoryIndex')->with(['success' => 'Kategori dihapus']);
    }
}
