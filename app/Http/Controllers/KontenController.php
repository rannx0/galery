<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konten;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontens = Konten::latest()->paginate(5);
        return view('kontens.index', compact('kontens'))
        ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('konten.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationpath = 'public/gamar/';
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationpath, $profileimage);
            $input['image'] = $profileimage;
        }
 
        Konten::create($input);

        return redirect()->route('index')
        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konten $kontens)
    {
        return view('konten.show', compact('kontens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konten $kontens)
    {
        return view('Konten.edit',compact('kontens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konten $kontens)
    {
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        ]);

        $input = $request::all();

        if($image = $request->file('image')){
            $destinationpath = 'public/gamar/';
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationpath, $profileimage);
            $input['image'] = $profileimage;
        }else {
            unset($input['image']);
        }

        $id->update('input');

        return redirect()->route('index')
        ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konten $kontens)
    {
        $kontens->delete();

        return redirect()->route('index')
                        ->with('success','Product deleted successfully');
    }
}
