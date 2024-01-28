<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('managments.categories.index')
            ->with(['categories' => Category::paginate(5)]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'title'=>'required|min:3',
        ]);

        $title = $request->title;


        Category::create([
            'title'=>$title,
            'slug'=>Str::slug($title)
        ]);


        return redirect()->route('categories.index')
            ->with(['success'=>'Category added successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('managments.categories.edit')
            ->with(['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([

            'title'=>'required',
        ]);

        $title = $request->title;


        $category->update([
            'title'=>$title,
            'slug'=>Str::slug($title)
        ]);


        return redirect()->route('categories.index')
            ->with(['message'=>'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();


        return redirect()->route('categories.index')
            ->with(['success'=>'Category deleted successfully']);
    }
}
