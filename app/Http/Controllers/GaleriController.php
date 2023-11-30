<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = Galeri::latest()->paginate(5);
        return view('galeris.index',compact('galeris'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $galeri = new Galeri([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $imageName,
        ]);
        $galeri->save();
        return redirect('/galeris')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $galeri = Galeri::find($id);
        return view('galeris.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $galeri = Galeri::find($id);
        return view('galeris.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $galeri = Galeri::find($id);
        $galeri->name = $request->get('name');
        $galeri->description = $request->get('description');
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $galeri->image = $imageName;
        }
        $galeri->save();
        return redirect('/galeris')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $galeri = Galeri::find($id);
        
    //     $galeri->delete($id);
    //     return redirect('/galeris')->with('success', 'Product deleted!');
    // }

     public function destroy($id)
     {
        $galeri = Galeri::findorfail($id);

        $file = public_path('/images/').$galeri->image;

        if (file_exists($file)){

            @unlink($file);
        }

        $galeri->delete();
        return back();
     }
}
