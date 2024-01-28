<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('managments.menus.index')
            ->with(['menus'=> Menu::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.menus.create')
        ->with(['categories'=> Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'=>'required|unique:menus,title',
            'description'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',
            'price'=>'required|numeric',
            'category_id'=>'required',
        ]);


        if($request->hasFile('image')){
            $image = $request->image;
            $PathImage ='MenuImages/';
            $NameImage = date('Ymd').'_'.$image->getClientOriginalName();
            $image->move($PathImage,$NameImage);

            Menu::create([

                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'description'=> $request->description,
                'image'=> $NameImage,
                'price'=> $request->price,
                'category_id'=> $request->category_id,

            ]);

        }

        return redirect()->route('menus.index')
            ->with(['success'=>'menu added successfully']);



    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('managments.menus.edit')
            ->with(['categories'=>Category::all(),'menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        // dd($request->all());
        $request->validate([
            'title'=>'required|unique:menus,title,'.$menu->id,
            'description'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:2048',
            'price'=>'required|numeric',
            'category_id'=>'required',
        ]);


        if($request->hasFile('image')){
            unlink(public_path('MenuImages/'.$menu->image));
            $image = $request->image;
            $PathImage ='MenuImages/';
            $NameImage = time().'_'.$image->getClientOriginalName();
            $image->move($PathImage,$NameImage);

            $menu->update([

                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'description'=> $request->description,
                'image'=> $NameImage,
                'price'=> $request->price,
                'category_id'=> $request->category_id,

            ]);

            return redirect()->route('menus.index')
                ->with(['success'=>'menu updated successfully']);

        }else{
            $menu->update([

                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'description'=> $request->description,
                'price'=> $request->price,
                'category_id'=> $request->category_id

            ]);

            return redirect()->route('menus.index')
            ->with(['success'=>'menu updated successfully']);

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if($menu->image){
            unlink(public_path('MenuImages/'.$menu->image));

        }

        $menu->delete();

        return redirect()->route('menus.index')
        ->with(['success'=>'menu updated successfully']);
    }
}
