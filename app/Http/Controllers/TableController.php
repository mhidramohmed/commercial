<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('managments.tables.index')
            ->with(['tables' => Table::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required|unique:tables,name',
            'status'=>'required|boolean'
        ]);

        $name = $request->name;


        Table::create([
            'name'=>$name,
            'status'=>$request->status,
            'slug'=>Str::slug($name)
        ]);


        return redirect()->route('tables.index')
            ->with(['message'=>'Table added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('managments.tables.edit')
            ->with(['table'=>$table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([

            'name'=>'required|unique:tables,name,'.$table->id,
            'status'=>'required|boolean'
        ]);

        $name = $request->name;


        $table->update([
            'name'=>$name,
            'slug'=>Str::slug($name),
            'status'=>$request->status
        ]);


        return redirect()->route('tables.index')
            ->with(['message'=>'table updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();


        return redirect()->route('tables.index')
            ->with(['message'=>'table deleted successfully']);
    }
}
