<?php

namespace App\Http\Controllers;

use App\Models\Servant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('managments.serveurs.index')
            ->with(['serveurs' => Servant::paginate(5)]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.serveurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required|min:3',

        ]);

        $name = $request->name;


        Servant::create([
            'name'=>$name,
            'adress'=>$request->adress
        ]);


        return redirect()->route('serveurs.index')
            ->with(['message'=>'Serveur added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Servant $servant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $serveur = Servant::find($id);

        return view('managments.serveurs.edit')
            ->with(['serveur'=>$serveur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $request->validate([

            'name'=>'required|min:3',
            
        ]);


        $serveur = Servant::find($id);

        $name = $request->name;

        $serveur->update([
            'name'=>$name,
            'adress'=>$request->adress
        ]);


        return redirect()->route('serveurs.index')
            ->with(['message'=>'Serveur updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $serveur = Servant::find($id);

        $serveur->delete();

        return redirect()->route('serveurs.index')
            ->with(['message'=>'Serveur deleted successfully']);
    }
}
